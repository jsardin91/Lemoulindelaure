"""Build isolated, static visual previews of the two native-block page patterns.

No WordPress connection, database access, external assets or build dependencies.
The Gutenberg patterns in inc/page-patterns.php remain the content source for WordPress.
"""
from html import escape
from html.parser import HTMLParser
from pathlib import Path
from urllib.parse import quote, unquote, urlsplit

ROOT = Path(__file__).resolve().parents[1]
OUT = ROOT / "design" / "prototypes"
OUT.mkdir(parents=True, exist_ok=True)
THEME = "../../wp-content/themes/lemoulindelaure-child/"
SERVICES = [
    ("earth", "Écureuil", "Terre", "Communication animale", "communication-animale", "squirrel"),
    ("fire", "Phénix", "Feu", "Accompagnement énergétique animalier", "accompagnement-energetique-animalier", "phoenix"),
    ("water", "Tortue", "Eau", "Connexion avec les défunts", "connexion-defunts", "turtle"),
    ("air", "Papillon", "Air", "Guidance pour soi", "guidance-pour-soi", "butterfly"),
]

def image(file, cls="", alt=""):
    dims = {'squirrel': (945,960), 'phoenix': (945,960), 'turtle': (960,946), 'butterfly': (960,959)}
    size = next((value for animal, value in dims.items() if animal in file), (700,636))
    return f'<figure class="{cls}"><img src="{THEME}assets/{file}" width="{size[0]}" height="{size[1]}" alt="{escape(alt)}"></figure>'

def section(cls, content):
    return f'<section class="lmdl-section {cls}"><div class="lmdl-container">{content}</div></section>'

def link(label, href, cls="lmdl-text-link", aria=""):
    accessibility = f' aria-label="{escape(aria)}"' if aria else ''
    if href.startswith('/'):
        href = 'destination.html?path=' + quote(href, safe='')
    return f'<a class="{cls}"{accessibility} href="{href}">{escape(label)}</a>'

def universes(heading_level=3):
    items = []
    for key, animal, element, title, slug, art in SERVICES:
        items.append(f'<article class="lmdl-universe-panel lmdl-universe-panel--{key}"><div class="lmdl-universe-panel__media">{image("art/painting-"+art+"-display.webp", "lmdl-universe-panel__painting")}</div><div class="lmdl-universe-panel__inner"><p class="lmdl-universe-panel__identity">{animal} · {element}</p><h{heading_level}>{title}</h{heading_level}><p>{link("Découvrir", "/accompagnements/"+slug+"/", "lmdl-universe-panel__link", "Découvrir "+title)}</p></div></article>')
    return '<div class="lmdl-universe-field">' + ''.join(items) + '</div>'

def shell(title, css, body):
    styles = ''.join(f'<link rel="stylesheet" href="{THEME}{path}">' for path in ['style.css','assets/css/components.css',*css])
    nav_items = ''.join(link(label, href, '') for label, href in [('Accompagnements','accompagnements.html'),('Le Jardin','/le-jardin/'),('À propos','/a-propos/'),('Journal','/journal/'),('FAQ','/faq/'),('Contact','/contact/')])
    nav = f'<header class="preview-header"><div class="lmdl-container"><a href="index.html"><img src="{THEME}assets/logo/logo-horizontal-transparent.png" alt="Le Moulin de Laure" width="1200" height="380"></a><nav class="preview-desktop-nav" aria-label="Navigation principale">{nav_items}</nav>{link("Prendre rendez-vous", "/prendre-rendez-vous/", "lmdl-button")}<details class="preview-menu"><summary>Menu</summary><nav aria-label="Navigation mobile">{nav_items}{link("Prendre rendez-vous", "/prendre-rendez-vous/")}</nav></details></div></header>'
    return f'<!doctype html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>{escape(title)} · prototype local</title>{styles}<link rel="stylesheet" href="preview.css"></head><body><a class="preview-skip" href="#contenu">Aller au contenu</a>{nav}<main id="contenu">{body}</main><footer class="preview-footer"><div class="lmdl-container">Le Moulin de Laure · Au cœur du lien, au-delà des sens.</div></footer></body></html>'

collage = '<div class="lmdl-art-collage">' + ''.join(image('art/painting-'+art+'-display.webp','lmdl-art-collage__'+cls) for art,cls in [('squirrel','lead'),('butterfly','second'),('turtle','third'),('phoenix','fourth')]) + '</div>'
home = section('lmdl-home-intro', f'<div class="lmdl-home-hero"><div class="lmdl-home-hero__copy"><h1>Le Moulin de Laure</h1><p class="lmdl-home-hero__signature">Au cœur du lien, au-delà des sens.</p><p>Quatre univers pour explorer les liens avec les animaux, les êtres chers et soi-même.</p><div class="lmdl-cta-group"><p>{link("Découvrir les accompagnements", "accompagnements.html", "lmdl-button")}</p><p>{link("Prendre rendez-vous", "/prendre-rendez-vous/")}</p></div></div><div class="lmdl-home-hero__art">{collage}</div></div>')
home += section('lmdl-home-manifesto', '<div class="lmdl-prose"><h2>Pourquoi Le Moulin ?</h2><p>Un chemin de cœur et quatre ailes : le vivant, l’énergie, la famille et les messages que l’on cherche à comprendre.</p></div>')
home += section('lmdl-home-universes', '<h2>Quatre chemins à découvrir</h2><p>Chaque univers a son image et sa place. Choisissez celui que vous souhaitez explorer.</p>'+universes())
home += section('lmdl-home-laure', f'<div class="lmdl-editorial-split"><div class="lmdl-prose"><h2>Rencontrer Laure</h2><p>Découvrez son parcours, son regard sur le vivant et les valeurs qui accompagnent sa pratique.</p>{link("À propos de Laure", "/a-propos/")}</div>{image("logo/embleme-transparent.png","lmdl-home-laure__emblem")}</div>')
home += section('lmdl-home-process', '<h2>Comment avancer ?</h2><div class="lmdl-process"><div class="lmdl-process__step"><h3>Découvrir</h3><p>Parcourez les quatre accompagnements.</p></div><div class="lmdl-process__step"><h3>Poser une question</h3><p>Contactez Laure si vous souhaitez une précision.</p></div><div class="lmdl-process__step"><h3>Prendre rendez-vous</h3><p>Consultez la page de réservation.</p></div></div>')
home += section('lmdl-home-values lmdl-surface--ink', '<h2>Un cadre d’écoute et de respect</h2><p>Bienveillance, non-jugement, honnêteté et confidentialité guident les échanges.</p><p>Laure ne pose pas de diagnostic médical ou vétérinaire. Les professionnels compétents restent essentiels lorsque la situation le demande.</p>')
home += section('lmdl-home-garden', f'<div class="lmdl-editorial-split"><div><h2>Le Jardin du Moulin</h2><p>Un espace pour découvrir les professionnels croisés sur le chemin de Laure, présentés avec leur accord.</p>{link("Découvrir le Jardin", "/le-jardin/")}</div>{image("art/painting-butterfly-display.webp", "lmdl-home-garden__art")}</div>')
home += section('lmdl-home-journal','<h2>Le Journal</h2><p>Un espace éditorial pour les futurs articles du Moulin.</p>'+link('Voir le Journal','/journal/'))
home += section('lmdl-home-close','<div class="lmdl-faq-booking"><div><h2>Une question ?</h2><p>Retrouvez les questions fréquentes sur les accompagnements.</p>'+link('Consulter la FAQ','/faq/')+'</div><div class="lmdl-home-close__booking"><h2>Prendre rendez-vous</h2><p>Vous pouvez consulter la page de réservation pour choisir la suite.</p>'+link('Prendre rendez-vous','/prendre-rendez-vous/','lmdl-button')+'</div></div>')

hub = section('lmdl-hub-intro','<div class="lmdl-prose"><h1>Les accompagnements</h1><p>Quatre chemins pour explorer le lien avec le vivant, les êtres chers et soi-même. Chaque page présente son approche.</p></div>')
hub += section('lmdl-hub-universes',universes(2))
hub += section('lmdl-hub-orientation','<h2>Quel chemin explorer ?</h2><div class="lmdl-hub-orientation__list">'+''.join('<p>'+link(label, '/accompagnements/'+slug+'/', '')+'</p>' for label,slug in [('Mieux comprendre votre animal → Communication animale','communication-animale'),('Explorer une approche énergétique pour un animal → Accompagnement énergétique animalier','accompagnement-energetique-animalier'),('Explorer un lien avec un défunt → Connexion avec les défunts','connexion-defunts'),('Chercher un autre éclairage pour soi → Guidance pour soi','guidance-pour-soi')])+'</div>')
hub += section('lmdl-hub-frame','<h2>Une même attention au lien</h2><p>Bienveillance, respect, honnêteté et confidentialité traversent les quatre univers.</p>')
hub += section('lmdl-hub-practical','<div class="lmdl-editorial-split"><div><h2>En pratique</h2><p>Les rendez-vous sont envisagés principalement en soirée et le samedi. Les modalités propres à chaque accompagnement restent à préciser.</p></div><div class="lmdl-boundary"><h3>Un cadre responsable</h3><p>Laure ne pose pas de diagnostic médical ou vétérinaire. Un professionnel compétent reste indispensable lorsque la situation le demande.</p></div></div>')
hub += section('lmdl-hub-close','<div class="lmdl-faq-booking"><div><h2>Vous avez une question ?</h2>'+link('Consulter la FAQ','/faq/')+'</div><div class="lmdl-home-close__booking"><h2>Poursuivre le chemin</h2>'+link('Prendre rendez-vous','/prendre-rendez-vous/','lmdl-button')+' '+link('Me contacter','/contact/')+'</div></div>')

(OUT/'index.html').write_text(shell('Accueil',['assets/css/pages/home.css','assets/css/pages/accompagnements.css'],home),encoding='utf-8')
(OUT/'accompagnements.html').write_text(shell('Accompagnements',['assets/css/pages/accompagnements.css','assets/css/pages/home.css'],hub),encoding='utf-8')
(OUT/'destination.html').write_text(shell('Destination hors prototype',[],section('','<h1>Page hors du prototype</h1><p>Cette destination existe dans l’architecture du site, mais son rendu n’est pas inclus dans cette revue locale.</p>'+link('Retour à l’accueil','index.html'))),encoding='utf-8')
class LinkParser(HTMLParser):
    def __init__(self):
        super().__init__()
        self.links = []
    def handle_starttag(self, tag, attrs):
        if tag == 'a':
            self.links.append(dict(attrs).get('href', ''))

for page in OUT.glob('*.html'):
    parser = LinkParser()
    parser.feed(page.read_text(encoding='utf-8'))
    for href in parser.links:
        if href and not href.startswith('#'):
            target = OUT / unquote(urlsplit(href).path)
            if not target.is_file():
                raise ValueError(f'Broken local preview link: {page.name} -> {href}')
print('Wrote isolated previews to', OUT)
