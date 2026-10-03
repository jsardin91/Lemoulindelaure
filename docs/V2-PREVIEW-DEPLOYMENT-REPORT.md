# Préversion V2 — déploiement et vérification du 2026-10-03

La branche `redesign/art-direction-v2` a remplacé la couche visuelle V1 sur `https://lemoulindelaure.fr/`, domaine de prévisualisation publique. Le thème enfant Astra est le seul paquet installé ; ni le parent, ni WordPress core, ni le contenu des pages en base n'ont été modifiés par ce déploiement. La préversion reste `noindex, follow` et `robots.txt` contient `User-agent: *` / `Allow: /`.

## Sauvegarde, installation, retour arrière

- Snapshot privé avant V2 : [run 37115809404](https://github.com/jsardin91/Lemoulindelaure/actions/runs/37115809404), ID `pre-37115809404`, hors webroot. Le workflow a vérifié dump DB, thème enfant, `wp-config.php`, `robots.txt` et sommes SHA-256. `blog_public=1` et thème enfant actif.
- Installation initiale : [run 37115865320](https://github.com/jsardin91/Lemoulindelaure/actions/runs/37115865320). Le thème et son CSS répondaient, mais l'accueil servait encore l'HTML V1 depuis LiteSpeed.
- Le workflow de thème vérifie désormais `lmdl_preview_noindex=1` et purge LiteSpeed après installation. Installation finale : [run 37115998942](https://github.com/jsardin91/Lemoulindelaure/actions/runs/37115998942), source `9743558`. L'accueil et le hub servent l'HTML V2 et conservent `<meta name="robots" content="noindex, follow">`.
- Retour arrière : utiliser `pre-37115809404` pour restaurer le thème V1 (et, seulement si nécessaire, les autres pièces du snapshot) après vérification des sommes. Le workflow de déploiement restaure automatiquement le thème précédent s'il échoue avant sa fin. Pour un retour manuel, utiliser le protocole du rapport `PRODUCTION-PREVIEW-DEPLOYMENT-REPORT.md`, conserver le noindex, purger LiteSpeed puis recontrôler accueil, hub, robots et liens.

## QA du rendu public

Edge headless a ouvert 12 routes à 375, 768, 1024 et 1440 px avec `prefers-reduced-motion: reduce` : **48 vues**. Toutes ont un H1, aucune largeur horizontale excessive, image cassée ou erreur console. Chaque vue renvoie `noindex, follow`. Les captures live de l'accueil, du hub et d'une page Terre ont été comparées au prototype et à la V1 ; elles montrent les œuvres à grande échelle, les quatre chapitres, le header/footer V2 et les compositions mobiles prévues. Les 12 destinations internes distinctes renvoient HTTP 200 ; `robots.txt` reste ouvert à la lecture des balises.

Le premier Tab cible le skip link. Le menu mobile natif `<details>` s'ouvre et expose la réservation ; les quatre liens d'univers sont visibles sous reduced motion. Mesure de laboratoire Edge sans throttling, cache navigateur désactivé : accueil LCP 492 ms / CLS 0 à 375, LCP 400 ms / CLS 0,001 à 1440 ; hub LCP 356/296 ms, CLS 0. Ces chiffres ne sont pas des Web Vitals terrain et devront être revérifiés avec les contenus et modules définitifs.

PHP lint passe pour les 11 fichiers PHP du thème ; `git diff --check` est propre. Aucun test automatisé historique n'est présent dans ce dépôt. Les scripts reproductibles sont `scripts/review-v2-prototypes.mjs`, `scripts/review-v2-wordpress.mjs`, `scripts/test-v2-interaction.mjs` et `scripts/measure-v2.mjs` ; leurs captures de travail restent ignorées sous `.local-wp/`.

## Limites et reprise

Les informations client manquantes restent manquantes : portrait de Laure, formulation exacte de la formation, tarifs/durées/modalités de service, réponses FAQ, articles, profils Jardin consentis, destinataire Forminator et vraie configuration Timetics. Les pages Contact/Booking affichent leurs états d'attente. Les compositions V2 accueil/hub/détails sont versionnées dans le thème ; leurs textes visibles ne suivent pas automatiquement une édition de leurs anciens blocs Gutenberg. Les autres pages continuent à utiliser leurs contenus Gutenberg V1 dans l'enveloppe V2. Avant indexation : intégrer le contenu validé, configurer et tester formulaires/réservation/consentement/SEO, puis revérifier les 48 vues et les parcours. Ne lever le noindex qu'après cette phase.
