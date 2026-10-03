import {spawn} from 'node:child_process';
import {mkdtemp,readFile,rm} from 'node:fs/promises';
import {tmpdir} from 'node:os';
import {join} from 'node:path';

const profile=await mkdtemp(join(tmpdir(),'lmdl-v3-addendum-'));
const edge=spawn('C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe',['--headless=new','--disable-gpu','--no-sandbox','--no-first-run','--disable-extensions','--remote-debugging-port=0',`--user-data-dir=${profile}`,'about:blank'],{stdio:'ignore'});
let socket;
try{
 let port;for(let i=0;i<100;i++){try{port=Number((await readFile(join(profile,'DevToolsActivePort'),'utf8')).split('\n')[0]);break}catch{await new Promise(r=>setTimeout(r,100))}}
 if(!port)throw Error('No CDP port');
 const tabs=await(await fetch(`http://127.0.0.1:${port}/json/list`)).json();socket=new WebSocket(tabs.find(t=>t.type==='page').webSocketDebuggerUrl);await new Promise((resolve,reject)=>{socket.onopen=resolve;socket.onerror=reject});
 let id=0;const pending=new Map();socket.onmessage=({data})=>{const m=JSON.parse(data);if(m.id&&pending.has(m.id)){pending.get(m.id)(m);pending.delete(m.id)}};
 const send=(method,params={})=>new Promise((resolve,reject)=>{const n=++id;pending.set(n,m=>m.error?reject(Error(JSON.stringify(m.error))):resolve(m.result));socket.send(JSON.stringify({id:n,method,params}))});
 const ev=async expression=>{const r=(await send('Runtime.evaluate',{expression,returnByValue:true,awaitPromise:true})).result;if(r.exceptionDetails)throw Error(r.exceptionDetails.text);return r.value??r};
 await send('Page.enable');await send('Runtime.enable');
 for(const width of [375,768,1024,1440]){
  await send('Emulation.setDeviceMetricsOverride',{width,height:900,deviceScaleFactor:1,mobile:width<768});
  await send('Page.navigate',{url:(process.env.LMDL_BASE_URL||'http://127.0.0.1:8765')+'/'});await new Promise(r=>setTimeout(r,900));
  const result=await ev(`(()=>{const q=s=>document.querySelector(s),css=(s,p)=>q(s)&&getComputedStyle(q(s))[p];return {width:${width},nav:[...document.querySelectorAll('.v3-header__nav>a,.v3-header__group>a')].map(x=>x.textContent.trim()),body:css('body','color'),bodyBackground:css('body','backgroundColor'),h1:css('h1','color'),link:css('.v3-header__nav a','color'),cta:css('.v3-header__booking','color'),ctaDecoration:css('.v3-header__booking','textDecorationLine'),ctaBorder:css('.v3-header__booking','borderBottomColor'),footer:css('.v3-footer','backgroundColor'),scrollWidth:document.documentElement.scrollWidth}})()`);
  console.log(JSON.stringify(result));
 }
 await send('Emulation.setDeviceMetricsOverride',{width:375,height:900,deviceScaleFactor:1,mobile:true});
 await send('Page.navigate',{url:(process.env.LMDL_BASE_URL||'http://127.0.0.1:8765')+'/contact/'});await new Promise(r=>setTimeout(r,1300));
 await ev(`document.querySelector('.forminator-button-submit')?.click()`);await new Promise(r=>setTimeout(r,900));
 console.log('FORM_EMPTY='+JSON.stringify(await ev(`({errors:[...document.querySelectorAll('.forminator-error-message')].map(x=>x.textContent.trim()),focus:document.activeElement?.id})`)));
 await ev(`(()=>{const f=document.querySelector('.lmdl-contact-form form');for(const [n,v] of [['text-1','Test Local'],['email-1','invalide'],['textarea-1','Message de test local']]){const x=f?.querySelector('[name="'+n+'"]');if(x){x.value=v;x.dispatchEvent(new Event('input',{bubbles:true}));x.dispatchEvent(new Event('change',{bubbles:true}))}}f?.querySelector('.forminator-button-submit')?.click()})()`);await new Promise(r=>setTimeout(r,900));
 console.log('FORM_INVALID='+JSON.stringify(await ev(`({errors:[...document.querySelectorAll('.forminator-error-message')].map(x=>x.textContent.trim())})`)));
 await ev(`(()=>{const x=document.querySelector('.lmdl-contact-form input[type=email]');x.value='test-local@example.invalid';x.dispatchEvent(new Event('input',{bubbles:true}));x.dispatchEvent(new Event('change',{bubbles:true}));document.querySelector('.forminator-button-submit')?.click()})()`);await new Promise(r=>setTimeout(r,1500));
 console.log('FORM_SUCCESS='+JSON.stringify(await ev(`({response:document.querySelector('.forminator-response-message')?.innerText,errors:[...document.querySelectorAll('.forminator-error-message')].map(x=>x.textContent.trim())})`)));
 await send('Emulation.setDeviceMetricsOverride',{width:375,height:900,deviceScaleFactor:1,mobile:true});
 await send('Page.navigate',{url:(process.env.LMDL_BASE_URL||'http://127.0.0.1:8765')+'/prendre-rendez-vous/'});await new Promise(r=>setTimeout(r,2300));
 await ev(`document.querySelector('.tt-meeting-list-item button')?.click()`);await new Promise(r=>setTimeout(r,1200));
 console.log('TIMETICS_CALENDAR='+JSON.stringify(await ev(`({modal:!!document.querySelector('.ant-modal'),text:document.querySelector('.ant-modal')?.innerText.slice(0,600),enabledDays:document.querySelectorAll('.ant-modal .flatpickr-day:not(.flatpickr-disabled):not(.prevMonthDay):not(.nextMonthDay)').length,slots:document.querySelectorAll('.tt-slot-list button').length})`)));
}finally{socket?.close();edge.kill();await new Promise(r=>setTimeout(r,150));await rm(profile,{recursive:true,force:true,maxRetries:5,retryDelay:100})}
