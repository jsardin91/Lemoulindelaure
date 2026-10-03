import {spawn} from 'node:child_process';
import {mkdtemp,mkdir,readFile,rm,writeFile} from 'node:fs/promises';
import {tmpdir} from 'node:os';
import {join} from 'node:path';

const output=join(import.meta.dirname,process.env.LMDL_REVIEW_DIR||'../.local-wp/review-v3-nojs');
await mkdir(output,{recursive:true});
const profile=await mkdtemp(join(tmpdir(),'lmdl-live-'));
const edge=spawn('C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe',['--headless=new','--disable-gpu','--no-sandbox','--no-first-run','--disable-extensions','--remote-debugging-port=0',`--user-data-dir=${profile}`,'about:blank'],{stdio:'ignore'});
let socket;
try {
 let port;
 for(let i=0;i<100;i++){try{port=Number((await readFile(join(profile,'DevToolsActivePort'),'utf8')).split('\n')[0]);break}catch{await new Promise(r=>setTimeout(r,100))}}
 if(!port)throw Error('No CDP port');
 const tabs=await(await fetch(`http://127.0.0.1:${port}/json/list`)).json();
 socket=new WebSocket(tabs.find(t=>t.type==='page').webSocketDebuggerUrl);
 await new Promise((resolve,reject)=>{socket.onopen=resolve;socket.onerror=reject});
 let id=0;const pending=new Map(),errors=[];
 socket.onmessage=({data})=>{const message=JSON.parse(data);if(message.method==='Runtime.exceptionThrown')errors.push(message.params.exceptionDetails.text);if(message.method==='Log.entryAdded'&&message.params.entry.level==='error')errors.push(message.params.entry.text);if(message.id&&pending.has(message.id)){pending.get(message.id)(message);pending.delete(message.id)}};
 const send=(method,params={})=>new Promise((resolve,reject)=>{const n=++id;pending.set(n,m=>m.error?reject(Error(JSON.stringify(m.error))):resolve(m.result));socket.send(JSON.stringify({id:n,method,params}))});
 const evaluate=async expression=>{const r=(await send('Runtime.evaluate',{expression,returnByValue:true,awaitPromise:true})).result;if(r.exceptionDetails)throw Error(r.exceptionDetails.text);return r.value};
 await send('Page.enable');await send('Runtime.enable');await send('Log.enable');await send('Emulation.setScriptExecutionDisabled',{value:true});
 const pages=[['home','/'],['hub','/accompagnements/'],['earth','/accompagnements/communication-animale/'],['fire','/accompagnements/accompagnement-energetique-animalier/'],['water','/accompagnements/connexion-defunts/'],['air','/accompagnements/guidance-pour-soi/'],['jardin','/le-jardin/'],['about','/a-propos/'],['journal','/journal/'],['faq','/faq/'],['contact','/contact/'],['booking','/prendre-rendez-vous/']];
 const report=[];
 for(const [name,path] of pages.filter(([name])=>['home','hub','earth'].includes(name)))for(const width of [390,1440]){
  errors.length=0;
  await send('Emulation.setDeviceMetricsOverride',{width,height:900,deviceScaleFactor:1,mobile:width<768});
  await send('Emulation.setEmulatedMedia',{features:[{name:'prefers-reduced-motion',value:'reduce'}]});
  await send('Page.navigate',{url:(process.env.LMDL_BASE_URL||'http://127.0.0.1:8765')+path});
  await new Promise(r=>setTimeout(r,1400));
  const dom=await send('DOM.getDocument',{depth:-1,pierce:true});
  const html=(await send('DOM.getOuterHTML',{nodeId:dom.root.nodeId})).outerHTML;
  const serviceLinks=(html.match(/Entrer dans l.univers/g)||[]).length;
  const data={h1:(html.match(/<h1(?:\s|>)/g)||[]).length,serviceLinks,hasPaintings:html.includes('painting-'),hasPortals:html.includes('v3-portal'),hasFooter:html.includes('v3-footer'),hasNoJsClass:html.includes('v3-has-js'),htmlLength:html.length};
  const shot=await send('Page.captureScreenshot',{format:'png'});
  await writeFile(join(output,`${name}-${width}.png`),Buffer.from(shot.data,'base64'));
  report.push({page:name,path,width,...data,errors:[...errors]});
  console.log(`${name} ${width} h1=${data.h1} links=${data.serviceLinks} paintings=${data.hasPaintings} portals=${data.hasPortals} jsClass=${data.hasNoJsClass}`);
 }
 await writeFile(join(output,'report.json'),JSON.stringify(report,null,2));
} finally {socket?.close();edge.kill();await new Promise(r=>setTimeout(r,150));await rm(profile,{recursive:true,force:true,maxRetries:5,retryDelay:100})}
