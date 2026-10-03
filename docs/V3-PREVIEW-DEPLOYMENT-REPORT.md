# V3 — préversion, tests et retour arrière

État du rapport : V3 déployée et contrôlée sur la préversion publique le 2026-10-03. Branche : `redesign/editorial-portals-v3`, créée du V2 live exact `0bfefe4bbd0fed21592d9d61e88f5606a3fe5ec5` puisque `origin/main` ne contenait pas V2. Source finale du thème déployé : `b9cdd6e9099c8d76cda4f55913904b16b72cee10` (avant dernier commit documentaire).

## Revue locale réelle

WordPress isolé sur `127.0.0.1:8765`, thème enfant V3 copié depuis le repo, Astra inchangé. Prototypes prioritaires Homepage, hub, Terre et Air : captures 1440/390 dans `.local-wp/review-v3-prototypes/`. Première passe : la fin de la Homepage était trop volumineuse ; Laure, Jardin et Journal ont été recomposés puis revus. Seconde passe : ajout des liens sur les portes, focus, H2 du hub et unique ressource image prioritaire par hero. Les pages Feu, Eau, Jardin, À propos, Journal, FAQ, Contact et réservation ont été inspectées dans le rendu local.

`node scripts/review-v3-wordpress.mjs` : **48 vues**, 12 routes × 375/768/1024/1440 ; un H1 par page, zéro débordement horizontal, image cassée ou erreur console visible. `node scripts/review-v3-nojs.mjs` : Homepage, hub et Terre à 390/1440 avec exécution des scripts désactivée ; H1, œuvres, portes et liens sont dans le DOM et les captures du premier écran restent lisibles. `node scripts/test-v3-interaction.mjs` : premier Tab sur « Aller au contenu », menu mobile natif ouvert, 4 portes et 8 liens (texte + œuvre) visibles, labels complets, `prefers-reduced-motion` à durée de transition quasi nulle. Les 19 chemins internes distincts trouvés dans les pages répondent HTTP 200 localement.

`node scripts/review-v3-performance.mjs` en laboratoire local : LCP accueil 1,824 s à 390 et 0,340 s à 1440 ; hub 0,256/0,324 s ; Terre 0,236/0,316 s. CLS observé entre 0 et 0,00062 sur ces vues. Ces mesures dépendent du cache et de la machine locale ; elles ne prédisent pas les métriques de terrain. Les images ont dimensions explicites, une seule priorité haute par hero, les autres sont différées. `php -l` passe sur les 24 PHP du thème enfant et `git diff --check` passe. Le repo ne possède pas de suite de tests applicatifs autonome ; les scripts de revue ci-dessus sont la vérification V3.

La fixture WordPress locale a `blog_public=0` et peut produire `noindex, nofollow, follow` ; ce n'est pas la politique du domaine public. Elle comporte aussi des posts `TEST LOCAL` exclus du déploiement. Le live doit conserver exactement `noindex, follow` et ne doit pas afficher de test fixture.

## Déploiement live et rollback

Branche poussée avant déploiement. `preview-audit-backup.yml` run **37120600151** : succès, `BACKUP_READY=pre-37120600151`, thème actif `lemoulindelaure-child`, `BLOG_PUBLIC=1`, snapshot privé hors webroot. `preview-deploy-theme.yml` run **37120703635** sur source `b3460af` avec cet ID : succès, lint PHP distant, vérification de l'option `lmdl_preview_noindex=1`, `CACHE_PURGED=yes`, `PREVIEW_NOINDEX=1`. Pour le polish Journal, nouveau snapshot privé **`pre-37121213664`** (backup run 37121213664), puis second déploiement **37121264221** de `b9cdd6e` réussi avec les mêmes garde-fous et purge. Le workflow a remplacé uniquement le thème enfant et n'a lancé aucun installateur de contenu ni changé la base. Astra parent est intact.

URL : `https://lemoulindelaure.fr/`. Les snapshots de rollback sont privés, hors webroot. Pour revenir au V3 avant polish : `pre-37121213664` ; pour revenir au V2 : `pre-37120600151`. Restaurer le thème enfant selon la procédure de préversion V2, sans modifier Astra parent. Ne jamais committer les backups ni les secrets. La décision d'indexation reste hors de cette mission.

## QA du domaine après purge

`LMDL_BASE_URL=https://lemoulindelaure.fr node scripts/review-v3-wordpress.mjs` : 12 routes × 375/768/1024/1440 = **48 vues**, toutes avec un H1, `noindex, follow` exact, aucune image cassée, aucun débordement horizontal ni erreur console. Captures `.local-wp/review-v3-live/`. `review-v3-nojs.mjs` : Homepage, hub et Terre à 390/1440 avec exécution JS désactivée, titres et portes dans le DOM, captures du premier écran lisibles. `test-v3-interaction.mjs` : premier Tab vers le contenu, menu mobile ouvert, quatre portes avec liens textuels et portes focusables, durée de transition neutralisée sous mouvement réduit. Les 12 destinations internes trouvées sur le hub répondent 200 depuis Edge. Le client HTTP Python seul reçoit 403 du filtrage du site ; les mêmes routes se chargent dans Edge et ses requêtes same-origin répondent 200, ce n'est pas une 404. Aucun texte `TEST LOCAL` n'est visible sur Journal, Contact ou réservation.

`review-v3-performance.mjs` (navigations de laboratoire avec cache chaud, sans valeur terrain) : LCP 0,352/0,104 s pour accueil 390/1440, 0,204/0,084 s pour hub et 0,100/0,088 s pour Terre ; CLS observé 0 sur ces six vues. Les métriques locales plus froides sont indiquées plus haut. Ne pas utiliser ces chiffres comme Core Web Vitals de production.

Une dernière revue d'un vrai article WordPress **local** à 390/1440 (`/journal/test-local-journal-7/`) a mis en évidence un espacement de prose trop serré. Le template d'article et sa CSS V3 ont été polis ; un nouveau commit/déploiement de thème les transporte. Aucun article test n'a été déployé sur le site public.

Après le second déploiement, le contrôle des 48 vues a été répété : exact `noindex, follow` sur toutes, un H1, zéro débordement, image cassée ou erreur console. Captures finales `.local-wp/review-v3-live-final/`.

## Points ouverts dépendant de Laure

Validation de toute copie publique, portrait, preuve exacte de formation, détails de service, tarifs/durées éventuels, vraies FAQ, vrais articles et profils du Jardin ; configuration vérifiée de Forminator, Timetics, consentement et SEO. Aucun de ces faits n'a été inventé pour densifier V3.
