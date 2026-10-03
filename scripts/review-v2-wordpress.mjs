import {spawn} from 'node:child_process';
import {mkdtemp,mkdir,readFile,rm,writeFile} from 'node:fs/promises';
import {tmpdir} from 'node:os';
import {join} from 'node:path';

const output=join(import.meta.dirname,'../.local-wp/review-v2-local');
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
 await send('Page.enable');await send('Runtime.enable');await send('Log.enable');
 const pages=[['home','/'],['hub','/accompagnements/'],['earth','/accompagnements/communication-animale/'],['fire','/accompagnements/accompagnement-energetique-animalier/'],['water','/accompagnements/connexion-defunts/'],['air','/accompagnements/guidance-pour-soi/'],['jardin','/le-jardin/'],['about','/a-propos/'],['journal','/journal/'],['faq','/faq/'],['contact','/contact/'],['booking','/prendre-rendez-vous/']];
 const report=[];
 for(const [name,path] of pages)for(const width of [375,768,1024,1440]){
  errors.length=0;
  await send('Emulation.setDeviceMetricsOverride',{width,height:900,deviceScaleFactor:1,mobile:width<768});
  await send('Emulation.setEmulatedMedia',{features:[{name:'prefers-reduced-motion',value:'reduce'}]});
  await send('Page.navigate',{url:'http://127.0.0.1:8765'+path});
  for(let i=0;i<120;i++){if(await evaluate(`document.readyState==='complete'&&document.querySelectorAll('h1').length>0`))break;await new Promise(r=>setTimeout(r,100))}
  await new Promise(r=>setTimeout(r,250));
  if(name==='home'&&(width===375||width===1440)){
   await evaluate(`(async()=>{for(let y=0;y<document.body.scrollHeight;y+=innerHeight){scrollTo(0,y);await new Promise(r=>setTimeout(r,35))}scrollTo(0,0);await Promise.all([...document.images].map(i=>i.decode().catch(()=>{})));return true})()`);
  }
  const data=await evaluate(`({title:document.title,h1:[...document.querySelectorAll('h1')].map(x=>x.textContent.trim()),width:innerWidth,scrollWidth:document.documentElement.scrollWidth,robots:[...document.querySelectorAll('meta[name=robots]')].map(x=>x.content),canonical:document.querySelector('link[rel=canonical]')?.href,brokenImages:[...document.images].filter(x=>x.complete&&!x.naturalWidth).map(x=>x.src),internalBroken:[...document.querySelectorAll('a[href]')].map(x=>x.getAttribute('href')).filter(x=>x&&x.startsWith('http://127.0.0.1')),placeholderText:document.body.innerText.includes('TEST LOCAL')||document.body.innerText.includes('certifiée par Laila Del Monte'),contactFields:document.querySelectorAll('forminator-custom-form input').length,bookingMeetings:document.querySelectorAll('.tt-meeting-list-item').length,header:!!document.querySelector('header'),footer:!!document.querySelector('footer'),links:[...document.querySelectorAll('a[href]')].filter(x=>x.href.startsWith(location.origin)).map(x=>new URL(x.href).pathname).filter((x,i,a)=>a.indexOf(x)===i)})`);
  if(['home','hub','contact','booking'].includes(name)||width===375){const shot=await send('Page.captureScreenshot',{format:'png',captureBeyondViewport:width===375||width===1440});await writeFile(join(output,`${name}-${width}.png`),Buffer.from(shot.data,'base64'))}
  report.push({page:name,path,width,...data,errors:[...errors]});
  console.log(`${name} ${width} h1=${data.h1.length} overflow=${data.scrollWidth-width} robots=${data.robots.join(',')} images=${data.brokenImages.length} errors=${errors.length}`);
 }
 await writeFile(join(output,'report.json'),JSON.stringify(report,null,2));
} finally {socket?.close();edge.kill();await new Promise(r=>setTimeout(r,150));await rm(profile,{recursive:true,force:true,maxRetries:5,retryDelay:100})}
