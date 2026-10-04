# FAQ V3 et article du Journal — suivi du 2026-10-04

## Constat avant correction

La FAQ V3 affichait huit réponses provisoires directement dans `partials/v3/faq.php`. Aucune section de réponses n'apparaissait sur l'accueil, le hub ou les pages accompagnements ; seul le menu menait à `/faq/`. Le template `single.php` possédait une typographie de lecture mais une ouverture très verticale, avec le tableau placé après toute la titraille.

Le plugin `structured-faq-manager` est actif sur la prévisualisation, mais son code n'est pas versionné dans le repo (`wp-content/plugins/structured-faq/README.md` est un emplacement réservé). Le diagnostic WP-CLI en lecture seule du run 37196067325 a identifié les shortcodes `structured_faq` et `structured_term_faq`, sans CPT FAQ. Le run 37196165347 a confirmé que les deux shortcodes sans paramètres rendent zéro octet et que la page `/faq/` n'a aucune métadonnée FAQ : il n'y avait donc pas de contenu plugin à afficher. Aucun contenu du plugin ni donnée privée n'a été exporté dans les logs.

## Implémentation

- `inc/v3/faq.php` centralise les huit réponses provisoires et le rendu natif `<details>/<summary>`. Aucun JSON-LD FAQPage n'est émis par le thème.
- La page `/faq/` lit désormais **uniquement** les blocs `core/details` présents dans son contenu WordPress, ou le shortcode `[structured_faq]` / `[structured_term_faq]` s'il y est inséré. Si le contenu choisi est vide, les huit réponses provisoires restent visibles. Le reste de l'ancien pattern V1 n'est pas réinjecté dans la composition V3.
- Deux patterns sont proposés dans Gutenberg : `lmdl/faq-v3-questions` (huit réponses provisoires éditables) et `lmdl/faq-v3-plugin` (shortcode, à utiliser après configuration réelle du plugin). Il faut remplacer le contenu FAQ ancien par le pattern choisi, puis vérifier visuellement et éditorialement le résultat. L'installation du plugin et ses réglages n'ont pas été modifiés.
- L'accueil, le hub et les quatre pages accompagnements possèdent maintenant un aperçu FAQ contextuel avec lien vers `/faq/`. Tant que la source WordPress/plugin n'est pas activée, ces aperçus utilisent la même copie provisoire. Dès qu'une source éditée existe, ils se limitent à un renvoi vers la FAQ pour éviter des réponses divergentes et ne lancent pas le shortcode sur plusieurs pages.
- `single.php` a une ouverture en double page sur desktop, texte avant tableau dans le DOM, puis une mesure de lecture stable. Sa fin propose un chemin vers la FAQ. Une FAQ propre à un article peut être insérée dans le corps Gutenberg avec le bloc natif Détails ; aucune question générique n'est ajoutée de force à chaque article.

## Règle de schéma

Un seul propriétaire doit produire FAQPage si ce balisage est finalement conservé. Le thème n'en produit aucun. L'état actuel est **zéro schéma FAQPage** dans la fixture locale. Avant d'activer les shortcodes plugin sur le site, vérifier leur HTML visible et leur éventuel JSON-LD, puis désactiver toute sortie FAQ concurrente de Rank Math. Le contenu visible et le schéma doivent correspondre. Les réponses attendent la relecture de Laure avant indexation.

## Vérifications

- PHP lint des fichiers touchés : réussi.
- Pattern `lmdl/faq-v3-questions` dans WordPress local : 8 blocs Détails, 8 éléments rendus, parse/sérialisation à l'identique.
- Basculement local temporaire de `/faq/` vers ce pattern : huit questions visibles, un H1, clavier Espace et focus opérationnels, zéro schéma FAQPage, aucune erreur console ou image cassée à 375/768/1024/1440. Le contenu initial de la fixture a été restauré et le point de test supprimé.
- Revue locale de 12 routes × 375/768/1024/1440, plus l'article de démonstration aux quatre largeurs. Captures de l'article et des modules FAQ vues après première passe ; l'affordance `+` des blocs édités a été ajoutée en seconde passe.
- Dix vues sans JavaScript à 390/1440 (accueil, hub, Terre, Air, FAQ) gardent leurs titres, liens et disclosures natifs. Le lint des 28 PHP du thème et la syntaxe des scripts de revue passent.

## Prévisualisation live

Source `4263227` poussée sur `redesign/editorial-portals-v3`, puis déployée par le workflow 37197606113 après le snapshot privé **`pre-37196165347`**. Le workflow a purgé LiteSpeed, confirmé `PREVIEW_NOINDEX=1` et ignoré les étapes de configuration DB V3 et d'article Journal. Astra parent et la base WordPress n'ont pas été modifiés par ce déploiement.

Sur `https://lemoulindelaure.fr/` : 12 routes × 375/768/1024/1440, plus l'article de démonstration aux quatre largeurs, soit **52 vues** : un H1 par page, aucun débordement horizontal, image cassée ou erreur console, robots exactement `noindex, follow`. L'accueil, le hub et les quatre univers ont chacun une section FAQ visible ; `/faq/` a huit réponses, zéro JSON-LD FAQPage et un second panneau qui s'ouvre à la barre d'espace avec focus conservé. Les cinq liens contextuels de la page FAQ répondent 200. L'article contient le renvoi FAQ et garde l'ordre texte puis image sur mobile. Dix vues live sans JavaScript (accueil, hub, Terre, Air, FAQ à 390/1440) passent. Captures ignorées sous `.local-wp/review-v3-faq-article-live/`, `.local-wp/review-v3-article-live/` et `.local-wp/review-v3-faq-nojs-live/`.

## Prochaine étape éditoriale

Laure relit les huit réponses, puis choisit si elle les maintient en blocs Gutenberg ou si le plugin Structured FAQ devient la source visible. Pour le second choix, configurer les entrées dans le plugin sur la prévisualisation, insérer son shortcode dans le contenu de la page FAQ, vérifier rendu/clavier/schéma, et enlever les doublons de Rank Math. Ne pas activer l'indexation à cette étape.
