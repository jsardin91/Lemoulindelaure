# Architecture frontend et interaction V3

## Runtime

WordPress reste le CMS et Astra le parent intact. Le template de page déjà affecté en base, `templates/lmdl-page-v1.php`, appelle désormais `header-v3.php`, `inc/v3/render.php` et `footer-v3.php`. `lmdl_v3_kind()` route les neuf pages dirigées artistiquement vers `partials/v3/` ; les pages fonctionnelles gardent leur `post_content` et leurs plugins. `single.php` présente les articles natifs dans l'enveloppe V3. Le contenu essentiel des compositions est structuré dans `inc/v3/content.php`. Les blocs Gutenberg V1 restent stockés en base pour rollback, mais ne pilotent plus les neuf compositions publiques V3.

Les quatre univers sont un tableau structuré (`element`, `animal`, `title`, `path`, `door`, `painting`, `preview`, prose). Chacun a un partial distinct. Aucun remplacement de chaînes dans `terre.html` ne participe au rendu V3. Le vieux `inc/v2.php` et les assets V2 restent dans le repo pour le rollback historique, sans rendu actif sur ces pages.

## Portes et navigation

Chaque `article` a un titre, sa phrase, un lien textuel et un second lien étendu sur la porte. Ce second lien porte un `aria-label` complet ; la scène picturale est décorative pour les technologies d'assistance. Desktop : `hover` ou `focus-within` entrouvre la porte en CSS 3D (700 ms). L'activation suit immédiatement l'URL, sans étape intermédiaire. Mobile et mouvement réduit : porte légèrement ouverte par défaut, lien direct. Air emploie désormais la nouvelle porte Papillon ajoutée au repo, avec un détourage V3 non destructif pour révéler son tableau. Le cadre CSS Air provisoire a été retiré. Le menu mobile est un `<details>` natif. Pas de React, GSAP, canvas ni dépendance frontend : quelques lignes de `assets/v3/v3.js` ajoutent une révélation discrète par `IntersectionObserver` si le mouvement est permis. Le JavaScript ne crée aucun texte, titre, lien ou état nécessaire.

## Sans JavaScript, SEO et performance

Le HTML initial contient H1/H2/H3, noms des services, éléments, animaux, prose, figures et liens. Sans JS, aucun élément n'est masqué : la classe `v3-has-js` n'existe pas et aucune révélation n'est attendue. Les contenus et destinations sont analysables côté serveur. Les images portent largeur et hauteur explicites ; le hero demande une seule image `fetchpriority="high"`, les images sous le pli sont lazy et le JS est différé. Les WebP dérivés limitent le poids des prévisualisations. `prefers-reduced-motion` supprime transitions, animations et scroll doux. Aucun workflow ne modifie le noindex existant.

## Évolutions de contenu

Quand Laure fournira ses textes vérifiés, modifier `inc/v3/content.php` et les libellés propres aux partials. Les tarifs, durées, détails métier, FAQ, preuves de formation, témoignages et profils non fournis restent absents. Les posts Journal restent des posts WordPress. Contact/Forminator et Timetics restent des composants fonctionnels séparés ; leurs configurations réelles demandent les données client.
