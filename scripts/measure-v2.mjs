import { spawn } from 'node:child_process';
import { mkdtemp, readFile, rm } from 'node:fs/promises';
import { tmpdir } from 'node:os';
import { join } from 'node:path';

const base = process.env.LMDL_BASE_URL || 'http://127.0.0.1:8765';
const profile = await mkdtemp(join(tmpdir(), 'lmdl-v2-perf-'));
const edge = spawn('C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe', [
  '--headless=new', '--disable-gpu', '--no-sandbox', '--no-first-run', '--disable-extensions',
  '--remote-debugging-port=0', `--user-data-dir=${profile}`, 'about:blank',
], { stdio: 'ignore' });
let socket;
try {
  let port;
  for (let i = 0; i < 100; i++) {
    try { port = Number((await readFile(join(profile, 'DevToolsActivePort'), 'utf8')).split('\n')[0]); break; }
    catch { await new Promise(resolve => setTimeout(resolve, 100)); }
  }
  if (!port) throw new Error('Edge CDP unavailable');
  const tabs = await (await fetch(`http://127.0.0.1:${port}/json/list`)).json();
  socket = new WebSocket(tabs.find(tab => tab.type === 'page').webSocketDebuggerUrl);
  await new Promise((resolve, reject) => { socket.onopen = resolve; socket.onerror = reject; });
  let id = 0;
  const pending = new Map();
  socket.onmessage = ({ data }) => { const message = JSON.parse(data); if (message.id && pending.has(message.id)) { pending.get(message.id)(message); pending.delete(message.id); } };
  const send = (method, params = {}) => new Promise((resolve, reject) => {
    const key = ++id;
    pending.set(key, message => message.error ? reject(new Error(JSON.stringify(message.error))) : resolve(message.result));
    socket.send(JSON.stringify({ id: key, method, params }));
  });
  const evaluate = async expression => (await send('Runtime.evaluate', { expression, returnByValue: true, awaitPromise: true })).result.value;
  await send('Page.enable'); await send('Runtime.enable'); await send('Network.enable');
  await send('Network.setCacheDisabled', { cacheDisabled: true });
  await send('Page.addScriptToEvaluateOnNewDocument', { source: `window.__v2Vitals={lcp:0,cls:0};new PerformanceObserver(list=>{for(const e of list.getEntries())window.__v2Vitals.lcp=e.startTime}).observe({type:'largest-contentful-paint',buffered:true});new PerformanceObserver(list=>{for(const e of list.getEntries())if(!e.hadRecentInput)window.__v2Vitals.cls+=e.value}).observe({type:'layout-shift',buffered:true});` });
  for (const [page, path] of [['home', '/'], ['hub', '/accompagnements/']]) {
    for (const width of [375, 1440]) {
      await send('Emulation.setDeviceMetricsOverride', { width, height: 900, deviceScaleFactor: 1, mobile: width < 600 });
      await send('Page.navigate', { url: base + path });
      for (let i = 0; i < 120; i++) { if (await evaluate(`document.readyState==='complete'`)) break; await new Promise(resolve => setTimeout(resolve, 100)); }
      await new Promise(resolve => setTimeout(resolve, 1300));
      const metrics = await evaluate(`({lcp:Math.round(window.__v2Vitals?.lcp||0),cls:Number((window.__v2Vitals?.cls||0).toFixed(3)),domContentLoaded:Math.round(performance.getEntriesByType('navigation')[0]?.domContentLoadedEventEnd||0),transferredKB:Math.round(performance.getEntriesByType('resource').reduce((sum,e)=>sum+e.transferSize,0)/1024),images:document.images.length})`);
      console.log(JSON.stringify({ page, width, ...metrics }));
    }
  }
} finally {
  socket?.close(); edge.kill();
  await new Promise(resolve => setTimeout(resolve, 150));
  await rm(profile, { recursive: true, force: true, maxRetries: 5, retryDelay: 100 });
}
