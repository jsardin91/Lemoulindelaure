const base=process.env.LMDL_BASE_URL||'http://127.0.0.1:8765';
const paths=['/','/accompagnements/','/accompagnements/communication-animale/','/accompagnements/accompagnement-energetique-animalier/','/accompagnements/connexion-defunts/','/accompagnements/guidance-pour-soi/','/le-jardin/','/a-propos/','/journal/','/faq/','/contact/','/prendre-rendez-vous/'];
let failures=0;
for(const path of paths){
 const response=await fetch(new URL(path,base));if(!response.ok){console.log(path,response.status);failures++;continue}
 const html=await response.text();
 const content=html.replace(/<script\b[^>]*>[\s\S]*?<\/script>/gi,' ').replace(/<style\b[^>]*>[\s\S]*?<\/style>/gi,' ');
 const text=content.replace(/<[^>]+>/g,' ').replace(/\s+/g,' ');
 const findings=[];
 for(const pattern of [/Laure (?:propose|accompagne|souhaite|place|croit|n’est|ne pose|a suivi)/gi,/écrire à Laure/gi,/peinture originale|peint par Laure|œuvre originale|les œuvres de Laure|détail de la peinture/gi,/son parcours|sa pratique/gi]){
  const matches=[...text.matchAll(pattern)].map(x=>x[0]);if(matches.length)findings.push(...matches);
 }
 const altMentions=[...content.matchAll(/\balt="([^"]*)"/gi)].map(x=>x[1]).filter(x=>/peinture|peint par Laure|œuvre/i.test(x));findings.push(...altMentions);
 console.log(path,findings.length?findings:'clean');failures+=findings.length;
}
if(failures)process.exitCode=1;
