import {spawn} from 'node:child_process';
import {mkdtemp,readFile,rm,writeFile} from 'node:fs/promises';
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
 for(const width of [375,768,1024,1200,1280,1366,1440,1600]){
  await send('Emulation.setDeviceMetricsOverride',{width,height:900,deviceScaleFactor:1,mobile:width<768});
  await send('Page.navigate',{url:(process.env.LMDL_BASE_URL||'http://127.0.0.1:8765')+'/'});await new Promise(r=>setTimeout(r,900));
  const result=await ev(`(()=>{const q=s=>document.querySelector(s),css=(s,p)=>q(s)&&getComputedStyle(q(s))[p];return {width:${width},nav:[...document.querySelectorAll('.v3-header__nav>a,.v3-header__group>a')].map(x=>x.textContent.trim()),body:css('body','color'),bodyBackground:css('body','backgroundColor'),h1:css('h1','color'),link:css('.v3-header__nav a','color'),cta:css('.v3-header__booking','color'),ctaDecoration:css('.v3-header__booking','textDecorationLine'),ctaBorder:css('.v3-header__booking','borderBottomColor'),footer:css('.v3-footer','backgroundColor'),astraSlot3:getComputedStyle(document.documentElement).getPropertyValue('--ast-global-color-3').trim(),navDisplay:css('.v3-header__nav','display'),bookingDisplay:css('.v3-header__booking','display'),headerHeight:q('.v3-header')?.getBoundingClientRect().height,navRight:q('.v3-header__nav')?.getBoundingClientRect().right,bookingLeft:q('.v3-header__booking')?.getBoundingClientRect().left,scrollWidth:document.documentElement.scrollWidth}})()`);
  console.log(JSON.stringify(result));
  if(process.env.LMDL_HEADER_SCREENSHOT&&width===Number(process.env.LMDL_HEADER_WIDTH||1024)){await new Promise(r=>setTimeout(r,450));const shot=await send('Page.captureScreenshot',{format:'png',captureBeyondViewport:false});await writeFile(process.env.LMDL_HEADER_SCREENSHOT,Buffer.from(shot.data,'base64'))}
  if(width===1024){await ev(`document.querySelector('.v3-header__group>a')?.focus()`);await new Promise(r=>setTimeout(r,220));console.log('SUBMENU_FOCUS='+JSON.stringify(await ev(`({focused:document.activeElement?.getAttribute('href'),visibility:getComputedStyle(document.querySelector('.v3-header__submenu')).visibility,links:document.querySelectorAll('.v3-header__submenu a').length})`)))}
 }
 await send('Emulation.setDeviceMetricsOverride',{width:375,height:900,deviceScaleFactor:1,mobile:true});
 await send('Page.navigate',{url:(process.env.LMDL_BASE_URL||'http://127.0.0.1:8765')+'/contact/'});await new Promise(r=>setTimeout(r,1300));
 await ev(`document.querySelector('.forminator-button-submit')?.click()`);await new Promise(r=>setTimeout(r,900));
 console.log('FORM_EMPTY='+JSON.stringify(await ev(`({errors:[...document.querySelectorAll('.forminator-error-message')].map(x=>x.textContent.trim()),focus:document.activeElement?.id})`)));
 await ev(`(()=>{const f=document.querySelector('.lmdl-contact-form form');for(const [n,v] of [['text-1','Test Local'],['email-1','invalide'],['textarea-1','Message de test local']]){const x=f?.querySelector('[name="'+n+'"]');if(x){x.value=v;x.dispatchEvent(new Event('input',{bubbles:true}));x.dispatchEvent(new Event('change',{bubbles:true}))}}f?.querySelector('.forminator-button-submit')?.click()})()`);await new Promise(r=>setTimeout(r,900));
 console.log('FORM_INVALID='+JSON.stringify(await ev(`({errors:[...document.querySelectorAll('.forminator-error-message')].map(x=>x.textContent.trim())})`)));
 if(!process.env.LMDL_READ_ONLY){
 await ev(`(()=>{const x=document.querySelector('.lmdl-contact-form input[type=email]');x.value='test-local@example.invalid';x.dispatchEvent(new Event('input',{bubbles:true}));x.dispatchEvent(new Event('change',{bubbles:true}));document.querySelector('.forminator-button-submit')?.click()})()`);await new Promise(r=>setTimeout(r,1500));
 console.log('FORM_SUCCESS='+JSON.stringify(await ev(`({response:document.querySelector('.forminator-response-message')?.innerText,errors:[...document.querySelectorAll('.forminator-error-message')].map(x=>x.textContent.trim())})`)));
 }
 await send('Emulation.setDeviceMetricsOverride',{width:375,height:900,deviceScaleFactor:1,mobile:true});
 await send('Page.navigate',{url:(process.env.LMDL_BASE_URL||'http://127.0.0.1:8765')+'/prendre-rendez-vous/'});await new Promise(r=>setTimeout(r,2300));
 if(process.env.LMDL_READ_ONLY){
  console.log('TIMETICS_PREVIEW='+JSON.stringify(await ev(`({meetings:document.querySelectorAll('.tt-meeting-list-item').length,visibleActions:[...document.querySelectorAll('.tt-meeting-action')].filter(x=>getComputedStyle(x).display!=='none').length,visibleDurations:[...document.querySelectorAll('.meeting-info-list')].filter(x=>getComputedStyle(x).display!=='none').length})`)));
 }else{
  await ev(`document.querySelector('.tt-meeting-list-item button')?.click()`);await new Promise(r=>setTimeout(r,1200));
  console.log('TIMETICS_CALENDAR='+JSON.stringify(await ev(`({modal:!!document.querySelector('.ant-modal'),text:document.querySelector('.ant-modal')?.innerText.slice(0,600),enabledDays:document.querySelectorAll('.ant-modal .flatpickr-day:not(.flatpickr-disabled):not(.prevMonthDay):not(.nextMonthDay)').length,slots:document.querySelectorAll('.tt-slot-list button').length})`)));
 }
 if(process.env.LMDL_MODAL_SCREENSHOT){const shot=await send('Page.captureScreenshot',{format:'png',captureBeyondViewport:false});await writeFile(process.env.LMDL_MODAL_SCREENSHOT,Buffer.from(shot.data,'base64'))}
}finally{socket?.close();edge.kill();await new Promise(r=>setTimeout(r,150));await rm(profile,{recursive:true,force:true,maxRetries:5,retryDelay:100})}
