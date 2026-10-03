# Usage des assets de marque — V3

Audit visuel : les quatre sources picturales, leurs dérivés display, quatre portes, logo horizontal, logo complet crème/transparent, emblème, signature, devise et icônes ont été ouverts côte à côte. La planche de contrôle locale est `.local-wp/v3-asset-sheet.png` (ignorée par Git) ; la planche source versionnée reste `design/asset-contact-sheet.png`. Les originaux ne sont pas modifiés.

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
| `door-passage.webp` | transition commune après le manifeste | porte déjà ouverte ; **jamais Air** |
| quatre `painting-*-display.webp` | couverture, chapitres, Jardin, Journal | dérivés des originaux ; les tableaux restent les sujets |

Les quatre fichiers `assets/brand-derived/v3/*-portal.webp` sont de simples réductions WebP (environ 720 px) des `assets/art/painting-*-display.webp`, générées par `scripts/build-v3-derived.py`. Ils servent uniquement derrière les portes et le cadre Air. Les peintures sources et display demeurent intactes. Le **portail Air** est un assemblage CSS (arche lavande, liseré doré, lignes et peinture Papillon) dans `assets/v3/v3.css` ; il est décrit publiquement comme « composition digitale dérivée du tableau Papillon », pas comme une quatrième porte officielle de Laure.

Les portails ne sont pas des images porte+tableau précalculées : la superposition laisse la porte bouger au focus/survol, et le tableau reste une image séparée. Sous mouvement réduit, la porte est simplement entrouverte. Chaque figure éditoriale portant un sens a un texte alternatif ou une légende ; les doublons purement décoratifs ont `alt=""`.
