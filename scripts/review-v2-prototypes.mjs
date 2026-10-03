import { spawn } from 'node:child_process';
import { mkdir, mkdtemp, readFile, rm, writeFile } from 'node:fs/promises';
import { tmpdir } from 'node:os';
import { join } from 'node:path';

const root = new URL('../', import.meta.url);
const output = new URL('../.local-wp/v2-review/', import.meta.url);
await mkdir(output, { recursive: true });
const profile = await mkdtemp(join(tmpdir(), 'lmdl-v2-'));
const edge = spawn('C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe', [
  '--headless=new', '--disable-gpu', '--no-sandbox', '--no-first-run', '--disable-extensions',
  '--remote-debugging-port=0', `--user-data-dir=${profile}`, 'about:blank',
], { stdio: 'ignore' });
let socket;
try {
  let port;
  for (let attempt = 0; attempt < 100; attempt++) {
    try { port = Number((await readFile(join(profile, 'DevToolsActivePort'), 'utf8')).split('\n')[0]); break; }
    catch { await new Promise(resolve => setTimeout(resolve, 100)); }
  }
  if (!port) throw new Error('Edge CDP port unavailable');
  const tabs = await (await fetch(`http://127.0.0.1:${port}/json/list`)).json();
  socket = new WebSocket(tabs.find(tab => tab.type === 'page').webSocketDebuggerUrl);
  await new Promise((resolve, reject) => { socket.onopen = resolve; socket.onerror = reject; });
  let sequence = 0;
  const pending = new Map();
  const errors = [];
  socket.onmessage = ({ data }) => {
    const message = JSON.parse(data);
    if (message.method === 'Runtime.exceptionThrown') errors.push(message.params.exceptionDetails.text);
    if (message.method === 'Log.entryAdded' && message.params.entry.level === 'error') errors.push(message.params.entry.text);
    if (message.id && pending.has(message.id)) { pending.get(message.id)(message); pending.delete(message.id); }
  };
  const send = (method, params = {}) => new Promise((resolve, reject) => {
    const id = ++sequence;
    pending.set(id, result => result.error ? reject(new Error(JSON.stringify(result.error))) : resolve(result.result));
    socket.send(JSON.stringify({ id, method, params }));
  });
  const evaluate = async expression => (await send('Runtime.evaluate', { expression, returnByValue: true })).result.value;
  await send('Page.enable'); await send('Runtime.enable'); await send('Log.enable');
  const report = [];
  for (const page of ['galerie', 'passages', 'collage', 'selected', 'hub', 'terre']) {
    for (const width of [1440, 390]) {
      errors.length = 0;
      await send('Emulation.setDeviceMetricsOverride', { width, height: 900, deviceScaleFactor: 1, mobile: width < 600 });
      await send('Emulation.setEmulatedMedia', { features: [{ name: 'prefers-reduced-motion', value: 'reduce' }] });
      await send('Page.navigate', { url: `http://127.0.0.1:8766/design/prototypes/v2/${page}.html` });
      for (let attempt = 0; attempt < 100; attempt++) {
        if (await evaluate(`document.readyState==='complete'`)) break;
        await new Promise(resolve => setTimeout(resolve, 100));
      }
      await new Promise(resolve => setTimeout(resolve, 250));
      const metrics = await evaluate(`({title:document.title,h1:document.querySelectorAll('h1').length,scrollWidth:document.documentElement.scrollWidth,width:innerWidth,brokenImages:[...document.images].filter(image=>image.complete&&!image.naturalWidth).map(image=>image.src)})`);
      const screenshot = await send('Page.captureScreenshot', { format: 'png', captureBeyondViewport: true });
      await writeFile(new URL(`${page}-${width}.png`, output), Buffer.from(screenshot.data, 'base64'));
      report.push({ page, width, ...metrics, errors: [...errors] });
    }
  }
  await writeFile(new URL('report.json', output), JSON.stringify(report, null, 2));
  console.log(JSON.stringify(report.map(({ page, width, scrollWidth, h1, brokenImages, errors }) => ({ page, width, overflow: scrollWidth - width, h1, brokenImages: brokenImages.length, errors: errors.length })), null, 2));
} finally {
  socket?.close(); edge.kill();
  await new Promise(resolve => setTimeout(resolve, 150));
  await rm(profile, { recursive: true, force: true, maxRetries: 5, retryDelay: 100 });
}
