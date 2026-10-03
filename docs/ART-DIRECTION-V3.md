# Direction artistique V3 — le livre peint et ses seuils

État : V3 intégrée au thème enfant sur `redesign/editorial-portals-v3` le 2026-10-03. Les fondations approuvées (palette, Lora, Source Sans 3, logo) restent actives. Cette V3 remplace la composition V2, pas l'identité.

## Thèse et système

**Un livre peint dont les portes ouvrent sur quatre mondes.** La couverture conserve la collision typographie/peintures de V2. Le manifeste sombre introduit le lien ; la porte ouverte `door-passage.webp` articule le passage ; les quatre grandes portes prennent ensuite la place principale. La salle des quatre portes sur `/accompagnements/` expose ces seuils comme des œuvres à traverser, sans grille de cartes.

Terre, Feu et Eau emploient respectivement les portes officielles Forêt, Phénix et Océan. Une peinture dérivée apparaît derrière chacune. Air n'a pas de porte officielle : son cadre lavande/or est une composition CSS avec la peinture Papillon. Le Passage reste l'ouverture commune, jamais l'image d'Air. Les quatre services, animaux, éléments, introductions et destinations restent visibles hors survol et dans le HTML initial.

## Mise en scène éditoriale

- **Accueil** : couverture asymétrique ; manifeste et devise ; Passage à grande échelle ; quatre seuils avec proportions/positions propres ; chapitre Laure avec emblème ; Jardin en médaillon pictural ; Journal en page inclinée ; fermeture verte et dernière page bleu encre.
- **Hub** : titre de salle d'exposition, quatre seuils à pleine largeur, légendes et liens persistants, cadre de pratique, fermeture. Les panneaux ne sont ni des cartes identiques ni des colonnes de largeur égale.
- **Terre** : proximité verte, deux colonnes de prose, peinture à découpe organique, note marginale, cadre pratique.
- **Feu** : porte et peinture verticales, rupture sombre, grandes lettres de fond et composition plus tendue.
- **Eau** : ouverture centrée, espace calme, prose lente, peinture en ellipse et vastes plages bleues.
- **Air** : cadre digital, grands blancs, texte décentré et peinture flottante oblique.
- **À propos** : portrait sans photo, emblème à la place d'un faux portrait, histoire en chapitres, signature graphique utilisée comme marque de Laure.
- **Jardin** : parenthèse verte, manifeste, espace réservé aux futurs portraits éditoriaux sans faux profils.
- **Journal** : couverture picturale, index dynamique des vrais articles WordPress, article natif avec chapeau, date et largeur de lecture. Les articles `TEST LOCAL` de la fixture ne sont pas du contenu public.
- **FAQ, Contact, réservation** : enveloppe typographique commune ; priorité à la lisibilité des réponses et des plugins.

## Deux passes de critique et correction

**Passe 1, composition.** Les premières captures WordPress à 1440/390 ont montré une Homepage trop longue en fin de parcours : emblème et peintures occupaient chacun une bande pleine largeur sans hiérarchie. Laure est maintenant une double page mesurée ; Jardin emploie un médaillon ; Journal une page inclinée. Les captures ont été rouvertes après correction. La salle des portes, Terre et Air ont été comparées à 1440/390.

**Passe 2, interaction et lecture.** Les portes étaient visuellement présentes mais seul le texte voisin activait le lien. Chacune est devenue un vrai lien avec nom accessible, focus visible et destination identique au CTA. Le hub emploie des H2 sous son H1 ; les H3 de l'accueil restent sous le H2 des quatre seuils. Une seule image prioritaire est demandée par hero ; les autres images sont différées. Le script JavaScript est une légère révélation visuelle au scroll, entièrement facultative. Le rendu sans JS a été contrôlé sur accueil, hub et Terre ; le menu `<details>` reste natif. La seconde vérification WordPress a couvert 12 routes × 4 largeurs. Un article de fixture locale a ensuite révélé que les marges de prose héritées étaient effacées par le reset V3 : le corps de l'article a reçu un rythme de lecture explicite, une ouverture magazine, une image ample et une fermeture signée graphiquement.

## Contrôle anti-générique

La peinture et les portes de Laure forment l'architecture du site ; les remplacer par des photos de stock ferait perdre l'interaction et les quatre chapitres. Pas de cards SaaS, bento, dégradé artificiel, parallax, scroll-jacking ou mouvement permanent. Les seuils ont une présence physique, mais les liens restent directs. Les états mobile et mouvement réduit montrent la porte entrouverte sans interaction obligatoire.

UI/UX Pro Max : hiérarchie, cibles, clavier, ordre mobile, images/dimensions, réduction du mouvement. Taste Skill : rythme, premier viewport, singularité de la matière et répétition des compositions. Frontend Design Pro : traduction de la thèse en templates PHP, CSS et assets du thème enfant. Les références 21st déjà inspectées pour V2 — [Editorial Image Hero](https://21st.dev/@felipemenezes098/components/hero-07), [Immersive Scroll Gallery](https://21st.dev/@ishamsu/components/immersive-scroll-gallery), [Image Masking](https://21st.dev/@uilayout.contact/components/image-masking) — restent des comparateurs de cadrage/échelle ; aucun code ni dépendance 21st n'est utilisé dans V3.
