# Usage des assets de marque — V3

## Révision photographique du 11 octobre 2026

La composition active conserve les quatre portes **sans image derrière elles**. Les photographies réelles d’animaux prennent place dans les séquences éditoriales de l’accueil, de la page À propos, des quatre accompagnements, du Jardin et du Journal. Les quatre tableaux signés apparaissent uniquement en petits médaillons dans leur chapitre respectif, sans légende visible ; un texte alternatif nomme l’œuvre et Laure. Les portraits de Laure, les photos d’animaux et les médaillons n’ont plus de légende visible. L’emblème et la signature gardent leurs usages de marque. La provenance et les licences des huit photos d’animaux sont consignées dans [CLIENT-FEEDBACK-2026-10-11.md](CLIENT-FEEDBACK-2026-10-11.md).

Sur les quatre pages de service, chaque photo d’animal et son tableau forment une seule composition : photographie large, médaillon carré en léger chevauchement sur fond papier. Les dispositions alternent selon les chapitres, sans image derrière les portes ni légende visible.

Les descriptions ci-dessous documentent la conception V3 initiale ; la révision ci-dessus prévaut pour le rendu actif. Les anciens dérivés `*-portal.webp` restent des fichiers historiques et ne sont pas appelés par les portes actives.

Audit visuel : les quatre sources picturales, leurs dérivés display, les trois portes fermées initiales, le Passage, logo horizontal, logo complet crème/transparent, emblème, signature, devise et icônes ont été ouverts côte à côte. La porte Papillon ajoutée ensuite sur `main` a été ouverte à sa taille native et comparée aux trois autres portes dans `.local-wp/new-doors.jpg` (ignoré par Git). La planche source versionnée reste `design/asset-contact-sheet.png`. Les originaux ne sont pas modifiés.

| Asset | Fonction V3 | Règle |
| --- | --- | --- |
| `logo-horizontal-transparent.png` | navigation sur papier clair | identifiant de site, taille mesurée |
| `logo-complet-creme.webp` | dernière page / couverture du footer bleu encre | inséré comme une page signée, pas répété partout |
| `logo-complet-transparent.png` | variante vérifiée | conservée ; la version crème assure le contraste du footer |
| `embleme-transparent.png` | chapitre Laure, Jardin, filigrane éditorial | n'est pas un portrait de Laure |
| `signature-transparent.png` | chapitre À propos | marque graphique « Le Moulin de Laure », pas une signature personnelle ou une preuve sous une citation inventée |
| `devise-transparent.png` | manifeste sombre | accompagne la devise approuvée « Au cœur du lien, au-delà des sens » |
| icônes | favicon / petits contextes techniques | pas agrandies comme œuvre |
| `door-forest.webp` | Terre / Écureuil | porte fermée officielle |
| `door-phoenix.webp` | Feu / Phénix | porte fermée officielle |
| `door-ocean.webp` | Eau / Tortue | porte fermée officielle |
| `door-butterfly.webp` | Air / Papillon | nouvelle porte générée à partir du tableau client et de la série des portes, source conservée |
| `door-passage.webp` | transition commune après le manifeste | porte déjà ouverte ; **jamais Air** |
| quatre `painting-*-display.webp` | couverture, chapitres, Jardin, Journal | dérivés des originaux ; les tableaux restent les sujets |

Les quatre fichiers `assets/brand-derived/v3/*-portal.webp` sont de simples réductions WebP (environ 720 px) des `assets/art/painting-*-display.webp`, générées par `scripts/build-v3-derived.py`. Ils appartiennent à la première conception V3 et ne sont plus affichés derrière les portes. Les peintures sources et display demeurent intactes. Le nouveau `door-butterfly.webp` est opaque, à la différence des autres portes ; le même script produit `assets/brand-derived/v3/door-butterfly-cutout.webp` en lui appliquant la silhouette alpha de `door-ocean.webp` (mêmes dimensions). C'est cette variante transparente que la V3 affiche comme porte Papillon, sans image derrière elle. Aucun motif n'est ajouté à la porte. Son master et son export originaux restent disponibles dans le repo.

Les portails ne sont pas des images porte+tableau précalculées : seule la porte est rendue, sur un aplat de couleur. Sous mouvement réduit, la porte reste immobile. Chaque figure éditoriale portant un sens a un texte alternatif ou une légende ; les doublons purement décoratifs ont `alt=""`.
