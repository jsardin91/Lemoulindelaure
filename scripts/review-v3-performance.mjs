import {spawn} from 'node:child_process';
import {mkdtemp,readFile,rm} from 'node:fs/promises';
import {tmpdir} from 'node:os';
import {join} from 'node:path';
const profile=await mkdtemp(join(tmpdir(),'lmdl-v3-perf-'));
const edge=spawn('C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe',['--headless=new','--disable-gpu','--no-sandbox','--no-first-run','--disable-extensions','--remote-debugging-port=0',`--user-data-dir=${profile}`,'about:blank'],{stdio:'ignore'});
let socket;
try{
 let port;for(let i=0;i<100;i++){try{port=Number((await readFile(join(profile,'DevToolsActivePort'),'utf8')).split('\n')[0]);break}catch{await new Promise(r=>setTimeout(r,100))}}
 const tabs=await(await fetch(`http://127.0.0.1:${port}/json/list`)).json();socket=new WebSocket(tabs.find(t=>t.type==='page').webSocketDebuggerUrl);await new Promise((ok,fail)=>{socket.onopen=ok;socket.onerror=fail});let id=0;const pending=new Map();socket.onmessage=({data})=>{const m=JSON.parse(data);if(m.id&&pending.has(m.id)){pending.get(m.id)(m);pending.delete(m.id)}};
 const send=(method,params={})=>new Promise((ok,fail)=>{const n=++id;pending.set(n,m=>m.error?fail(Error(JSON.stringify(m.error))):ok(m.result));socket.send(JSON.stringify({id:n,method,params}))});
 const evalJs=async expression=>(await send('Runtime.evaluate',{expression,returnByValue:true})).result.value;
 await send('Page.enable');await send('Runtime.enable');
 await send('Page.addScriptToEvaluateOnNewDocument',{source:`window.__v3Vitals={lcp:0,cls:0};try{new PerformanceObserver(list=>{for(const entry of list.getEntries())window.__v3Vitals.lcp=entry.startTime}).observe({type:'largest-contentful-paint',buffered:true});new PerformanceObserver(list=>{for(const entry of list.getEntries())if(!entry.hadRecentInput)window.__v3Vitals.cls+=entry.value}).observe({type:'layout-shift',buffered:true})}catch(e){}`});
 const base=process.env.LMDL_BASE_URL||'http://127.0.0.1:8765';
 for(const [page,path] of [['home','/'],['hub','/accompagnements/'],['earth','/accompagnements/communication-animale/']])for(const width of [390,1440]){
  await send('Emulation.setDeviceMetricsOverride',{width,height:900,deviceScaleFactor:1,mobile:width<768});await send('Page.navigate',{url:base+path});
  for(let i=0;i<100;i++){if(await evalJs(`document.readyState==='complete'`))break;await new Promise(r=>setTimeout(r,100))}await new Promise(r=>setTimeout(r,1300));
  const data=await evalJs(`({vitals:window.__v3Vitals,resources:performance.getEntriesByType('resource').length,images:[...document.images].filter(x=>x.loading==='eager').length,priority:[...document.images].filter(x=>x.fetchPriority==='high').length,js:[...document.scripts].filter(x=>x.src.includes('/assets/v3/')).length})`);console.log(page,width,JSON.stringify(data));
 }
}finally{socket?.close();edge.kill();await new Promise(r=>setTimeout(r,150));await rm(profile,{recursive:true,force:true,maxRetries:5,retryDelay:100})}
