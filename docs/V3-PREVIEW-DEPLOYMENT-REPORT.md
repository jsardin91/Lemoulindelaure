# V3 — préversion, tests et retour arrière

État du rapport : intégration locale terminée le 2026-10-03 ; la section live sera complétée après déploiement. Branche : `redesign/editorial-portals-v3`, créée du V2 live exact `0bfefe4bbd0fed21592d9d61e88f5606a3fe5ec5` puisque `origin/main` ne contenait pas V2.

## Revue locale réelle

WordPress isolé sur `127.0.0.1:8765`, thème enfant V3 copié depuis le repo, Astra inchangé. Prototypes prioritaires Homepage, hub, Terre et Air : captures 1440/390 dans `.local-wp/review-v3-prototypes/`. Première passe : la fin de la Homepage était trop volumineuse ; Laure, Jardin et Journal ont été recomposés puis revus. Seconde passe : ajout des liens sur les portes, focus, H2 du hub et unique ressource image prioritaire par hero. Les pages Feu, Eau, Jardin, À propos, Journal, FAQ, Contact et réservation ont été inspectées dans le rendu local.

`node scripts/review-v3-wordpress.mjs` : **48 vues**, 12 routes × 375/768/1024/1440 ; un H1 par page, zéro débordement horizontal, image cassée ou erreur console visible. `node scripts/review-v3-nojs.mjs` : Homepage, hub et Terre à 390/1440 avec exécution des scripts désactivée ; H1, œuvres, portes et liens sont dans le DOM et les captures du premier écran restent lisibles. `node scripts/test-v3-interaction.mjs` : premier Tab sur « Aller au contenu », menu mobile natif ouvert, 4 portes et 8 liens (texte + œuvre) visibles, labels complets, `prefers-reduced-motion` à durée de transition quasi nulle. Les 19 chemins internes distincts trouvés dans les pages répondent HTTP 200 localement.

`node scripts/review-v3-performance.mjs` en laboratoire local : LCP accueil 1,824 s à 390 et 0,340 s à 1440 ; hub 0,256/0,324 s ; Terre 0,236/0,316 s. CLS observé entre 0 et 0,00062 sur ces vues. Ces mesures dépendent du cache et de la machine locale ; elles ne prédisent pas les métriques de terrain. Les images ont dimensions explicites, une seule priorité haute par hero, les autres sont différées. `php -l` passe sur les 24 PHP du thème enfant et `git diff --check` passe. Le repo ne possède pas de suite de tests applicatifs autonome ; les scripts de revue ci-dessus sont la vérification V3.

La fixture WordPress locale a `blog_public=0` et peut produire `noindex, nofollow, follow` ; ce n'est pas la politique du domaine public. Elle comporte aussi des posts `TEST LOCAL` exclus du déploiement. Le live doit conserver exactement `noindex, follow` et ne doit pas afficher de test fixture.

## Déploiement live et rollback

À compléter après : push du commit V3, `preview-audit-backup.yml` réussi avec `BACKUP_READY`, `preview-deploy-theme.yml` sur la branche avec cet ID, purge LiteSpeed, 12 routes × 4 largeurs, no-JS et liens, contrôle exact `noindex, follow`. Aucun changement de base n'est prévu : le workflow ne remplace que le child theme et exige `lmdl_preview_noindex=1`.

Le snapshot de rollback est privé, hors webroot. Restaurer le thème depuis l'archive privée de ce snapshot selon le workflow/document de préversion V2, sans modifier Astra parent. Ne jamais committer le backup ni les secrets. La décision d'indexation reste hors de cette mission.

## Points ouverts dépendant de Laure

Validation de toute copie publique, portrait, preuve exacte de formation, détails de service, tarifs/durées éventuels, vraies FAQ, vrais articles et profils du Jardin ; configuration vérifiée de Forminator, Timetics, consentement et SEO. Aucun de ces faits n'a été inventé pour densifier V3.
