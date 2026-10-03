# Portes animées — composant réutilisable

Quatre portes fermées correspondent aux quatre univers. Les illustrations originales sont des assets de marque ; leurs noms ne remplacent jamais les intitulés de service dans le HTML.

| Univers | Porte fermée | Tableau révélé | Page |
| --- | --- | --- | --- |
| Terre | `door-forest.webp` | `painting-squirrel-display.webp` | Communication animale |
| Feu | `door-phoenix.webp` | `painting-phoenix-display.webp` | Accompagnement énergétique animalier |
| Eau | `door-ocean.webp` | `painting-turtle-display.webp` | Connexion avec les défunts |
| Air | `door-butterfly.webp` | `painting-butterfly-display.webp` | Guidance pour soi |

Le fichier `door-passage.webp` reste une transition commune ouverte, pas une cinquième porte fermée.

## Utilisation dans WordPress

Insérer un bloc **Code court** avec l'un de ces exemples :

```text
[lmdl_portal href="/accompagnements/communication-animale/" label="Communication animale" art="forest"]
[lmdl_portal href="/accompagnements/accompagnement-energetique-animalier/" label="Accompagnement énergétique animalier" art="phoenix"]
[lmdl_portal href="/accompagnements/connexion-defunts/" label="Connexion avec les défunts" art="ocean"]
[lmdl_portal href="/accompagnements/guidance-pour-soi/" label="Guidance pour soi" art="butterfly"]
```

Le shortcode PHP est dans `inc/door-portals.php` ; l'animation est dans `assets/css/door-portals.css` et `assets/js/door-portals.js`. Le lien `<a>` et son libellé restent présents dans le HTML. La porte pivote au survol et au focus clavier ; un clic ordinaire lance l'ouverture puis suit le lien après 550 ms. Un lien ouvert dans un nouvel onglet, le JavaScript désactivé et `prefers-reduced-motion: reduce` conservent la navigation native. Le texte descriptif et le titre de chaque service doivent rester visibles hors de l'illustration.

Ce composant est disponible pour les futures compositions. Le hub V1 actuellement publié emploie les quatre tableaux dans une même architecture et ne change pas automatiquement quand les fichiers du thème sont mis à jour. Toute insertion dans la page doit être revue aux largeurs 375, 768, 1024 et 1440 px, avec clavier et mouvement réduit.

## Sources

Les quatre masters sont dans `design/brand/doors/`. `door-butterfly-master.png` a été généré à partir du style des portes Forêt et Océan et du tableau papillon fourni par le client. `scripts/build-brand-assets.py` produit la version WebP du thème au format 512 × 768. Les trois autres portes et leurs œuvres originales restent inchangées.
