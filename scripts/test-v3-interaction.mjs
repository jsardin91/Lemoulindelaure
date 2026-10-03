import {spawn} from 'node:child_process';
import {mkdtemp,readFile,rm} from 'node:fs/promises';
import {tmpdir} from 'node:os';
import {join} from 'node:path';
const profile=await mkdtemp(join(tmpdir(),'lmdl-live-focus-'));
const base=process.env.LMDL_BASE_URL||'http://127.0.0.1:8765';
const edge=spawn('C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe',['--headless=new','--disable-gpu','--no-sandbox','--no-first-run','--disable-extensions','--remote-debugging-port=0',`--user-data-dir=${profile}`,'about:blank'],{stdio:'ignore'});
let ws;
try{
 let port;for(let i=0;i<100;i++){try{port=Number((await readFile(join(profile,'DevToolsActivePort'),'utf8')).split('\n')[0]);break}catch{await new Promise(r=>setTimeout(r,100))}};
 const tabs=await(await fetch(`http://127.0.0.1:${port}/json/list`)).json();ws=new WebSocket(tabs.find(t=>t.type==='page').webSocketDebuggerUrl);await new Promise((ok,fail)=>{ws.onopen=ok;ws.onerror=fail});let id=0;const pending=new Map();ws.onmessage=({data})=>{const m=JSON.parse(data);if(m.id&&pending.has(m.id)){pending.get(m.id)(m);pending.delete(m.id)}};
 const send=(method,params={})=>new Promise((ok,fail)=>{const n=++id;pending.set(n,m=>m.error?fail(Error(JSON.stringify(m.error))):ok(m.result));ws.send(JSON.stringify({id:n,method,params}))});
 const evalJs=async expression=>(await send('Runtime.evaluate',{expression,returnByValue:true})).result.value;
 await send('Page.enable');await send('Runtime.enable');await send('Emulation.setDeviceMetricsOverride',{width:375,height:850,deviceScaleFactor:1,mobile:true});await send('Emulation.setEmulatedMedia',{features:[{name:'prefers-reduced-motion',value:'reduce'}]});
 await send('Page.navigate',{url:base+'/'});for(let i=0;i<100;i++){if(await evalJs(`document.readyState==='complete'`))break;await new Promise(r=>setTimeout(r,100))};
 await send('Input.dispatchKeyEvent',{type:'keyDown',key:'Tab',code:'Tab',windowsVirtualKeyCode:9});await send('Input.dispatchKeyEvent',{type:'keyUp',key:'Tab',code:'Tab',windowsVirtualKeyCode:9});
 const first=await evalJs(`({text:document.activeElement.textContent.trim(),visible:getComputedStyle(document.activeElement).visibility,href:document.activeElement.getAttribute('href')})`);
 const menu=await evalJs(`(()=>{const b=document.querySelector('.v3-header__menu summary');if(!b)return {found:false};b.click();return {found:true,expanded:b.parentElement.open,booking:[...document.querySelectorAll('a[href$="/prendre-rendez-vous/"]')].filter(x=>x.getClientRects().length).length}})()`);
 await send('Page.navigate',{url:base+'/accompagnements/'});for(let i=0;i<100;i++){if(await evalJs(`document.readyState==='complete'&&document.querySelectorAll('.v3-gateway').length===4`))break;await new Promise(r=>setTimeout(r,100))};
 const hub=await evalJs(`({panels:document.querySelectorAll('.v3-gateway').length,links:[...document.querySelectorAll('.v3-gateway__copy a,.v3-portal__hit')].map(x=>({text:x.textContent.trim(),href:x.pathname,visible:x.getClientRects().length>0})),reduced:matchMedia('(prefers-reduced-motion: reduce)').matches})`);
 const extras=await evalJs(`({doorLinks:document.querySelectorAll('.v3-portal__hit').length,focusTargets:[...document.querySelectorAll('.v3-portal__hit')].map(x=>({label:x.getAttribute('aria-label'),href:x.pathname,minHeight:getComputedStyle(x).minHeight})),motion:getComputedStyle(document.querySelector('.v3-portal__door')).transitionDuration})`);console.log(JSON.stringify({first,menu,hub,extras},null,2));
}finally{ws?.close();edge.kill();await new Promise(r=>setTimeout(r,150));await rm(profile,{recursive:true,force:true,maxRetries:5,retryDelay:100})}
