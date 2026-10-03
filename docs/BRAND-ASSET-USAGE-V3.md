# Usage des assets de marque — V3

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

Les quatre fichiers `assets/brand-derived/v3/*-portal.webp` sont de simples réductions WebP (environ 720 px) des `assets/art/painting-*-display.webp`, générées par `scripts/build-v3-derived.py`. Ils servent derrière les portes. Les peintures sources et display demeurent intactes. Le nouveau `door-butterfly.webp` est opaque, à la différence des autres portes ; le même script produit `assets/brand-derived/v3/door-butterfly-cutout.webp` en lui appliquant la silhouette alpha de `door-ocean.webp` (mêmes dimensions). C'est cette variante transparente que la V3 affiche et entrouvre devant le tableau Papillon. Aucun motif n'est ajouté à la porte. Son master et son export originaux restent disponibles dans le repo. La légende publique la nomme « création dérivée de la peinture de Laure » afin de ne pas présenter l'illustration générée comme une nouvelle œuvre originale peinte par elle.

Les portails ne sont pas des images porte+tableau précalculées : la superposition laisse la porte bouger au focus/survol, et le tableau reste une image séparée. Sous mouvement réduit, la porte est simplement entrouverte. Chaque figure éditoriale portant un sens a un texte alternatif ou une légende ; les doublons purement décoratifs ont `alt=""`.
