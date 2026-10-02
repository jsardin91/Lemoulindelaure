// Local Chromium DevTools review of isolated previews; no npm dependencies.
import { spawn } from 'node:child_process';
import { mkdtemp, readdir, readFile, rm, writeFile } from 'node:fs/promises';
import { tmpdir } from 'node:os';
import { join, resolve } from 'node:path';
import { pathToFileURL } from 'node:url';

const root = resolve(import.meta.dirname, '..');
const dir = join(root, 'design', 'prototypes');
const profile = await mkdtemp(join(tmpdir(), 'lmdl-edge-review-'));
const browser = spawn('C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe', [
  '--headless=new', '--disable-gpu', '--disable-gpu-sandbox', '--disable-software-rasterizer',
  '--no-sandbox', '--no-first-run', '--disable-extensions', '--remote-debugging-port=0',
  `--user-data-dir=${profile}`, 'about:blank'
], { stdio: 'ignore' });
let ws;
try {
  let port;
  for (let i = 0; i < 50; i++) {
    try { port = Number((await readFile(join(profile, 'DevToolsActivePort'), 'utf8')).split('\n')[0]); break; }
    catch { await new Promise(r => setTimeout(r, 100)); }
  }
  if (!port) throw new Error('DevToolsActivePort unavailable');
  const pages = await (await fetch(`http://127.0.0.1:${port}/json/list`)).json();
  const page = pages.find(p => p.type === 'page');
  if (!page) throw new Error('No page target');
  ws = new WebSocket(page.webSocketDebuggerUrl);
  await new Promise((ok, fail) => { ws.onopen = ok; ws.onerror = fail; });
  let next = 0;
  const pending = new Map();
  const errors = [];
  ws.onmessage = ({ data }) => {
    const msg = JSON.parse(data);
    if (msg.method === 'Runtime.exceptionThrown') errors.push(msg.params.exceptionDetails.text);
    if (msg.method === 'Log.entryAdded' && msg.params.entry.level === 'error') errors.push(msg.params.entry.text);
    if (msg.id && pending.has(msg.id)) { pending.get(msg.id)(msg); pending.delete(msg.id); }
  };
  const send = (method, params = {}) => new Promise((ok, fail) => {
    const id = ++next;
    pending.set(id, msg => msg.error ? fail(new Error(JSON.stringify(msg.error))) : ok(msg.result));
    ws.send(JSON.stringify({ id, method, params }));
  });
  await send('Page.enable'); await send('Runtime.enable'); await send('Log.enable');
  const report = [];
  for (const name of ['index', 'accompagnements']) for (const width of [375, 768, 1024, 1440]) {
    await send('Emulation.setDeviceMetricsOverride', { width, height: 900, deviceScaleFactor: 1, mobile: width < 768 });
    await send('Emulation.setEmulatedMedia', { features: [{ name: 'prefers-reduced-motion', value: 'reduce' }] });
    await send('Page.navigate', { url: pathToFileURL(join(dir, name + '.html')).href });
    await new Promise(r => setTimeout(r, 350));
    const metrics = await send('Runtime.evaluate', { expression: `({width:innerWidth, scrollWidth:document.documentElement.scrollWidth, height:document.documentElement.scrollHeight, images:[...document.images].filter(i=>!i.complete||!i.naturalWidth).map(i=>i.src), links:[...document.querySelectorAll('main a')].length, panelLinkLabels:[...document.querySelectorAll('.lmdl-universe-panel__link')].map(a=>a.getAttribute('aria-label')), minPanelTarget:Math.min(...[...document.querySelectorAll('.lmdl-universe-panel__link')].map(a=>a.getBoundingClientRect().height)), reduced:matchMedia('(prefers-reduced-motion: reduce)').matches})`, returnByValue: true });
    const png = await send('Page.captureScreenshot', { format: 'png', captureBeyondViewport: false });
    await writeFile(join(dir, `${name}-${width}-cdp.png`), Buffer.from(png.data, 'base64'));
    if (width === 1440 || width === 375) {
      const full = await send('Page.captureScreenshot', { format: 'png', captureBeyondViewport: true });
      await writeFile(join(dir, `${name}-${width}-full.png`), Buffer.from(full.data, 'base64'));
    }
    await send('Input.dispatchKeyEvent', { type: 'keyDown', key: 'Tab', code: 'Tab', windowsVirtualKeyCode: 9 });
    await send('Input.dispatchKeyEvent', { type: 'keyUp', key: 'Tab', code: 'Tab', windowsVirtualKeyCode: 9 });
    const focus = await send('Runtime.evaluate', { expression: 'document.activeElement?.outerHTML?.slice(0,180)', returnByValue: true });
    let focusGrowth = null;
    if (name === 'accompagnements' && width === 1440) {
      await send('Emulation.setEmulatedMedia', { features: [{ name: 'prefers-reduced-motion', value: 'no-preference' }] });
      await send('Runtime.evaluate', { expression: `document.querySelector('.lmdl-universe-panel__link').focus()` });
      await new Promise(r => setTimeout(r, 350));
      const result = await send('Runtime.evaluate', { expression: `getComputedStyle(document.querySelector('.lmdl-universe-panel')).flexGrow`, returnByValue: true });
      focusGrowth = result.result.value;
    }
    report.push({ page: name, requestedWidth: width, ...metrics.result.value, firstTab: focus.result.value, focusGrowth, errors: [...errors] });
  }
  console.log(JSON.stringify(report, null, 2));
  const failures = report.filter(row => row.scrollWidth > row.width || row.images.length || row.errors.length || row.minPanelTarget < 44 || row.panelLinkLabels.some(label => !label));
  if (report.find(row => row.page === 'accompagnements' && row.requestedWidth === 1440)?.focusGrowth !== '1.38') failures.push('Keyboard focus did not expand the active panel');
  if (failures.length) throw new Error(`Preview review failed: ${JSON.stringify(failures)}`);
} finally {
  ws?.close(); browser.kill();
  await new Promise(r => setTimeout(r, 150));
  await rm(profile, { recursive: true, force: true, maxRetries: 5, retryDelay: 100 });
}
