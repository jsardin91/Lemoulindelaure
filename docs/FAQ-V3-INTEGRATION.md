# FAQ V3 et article du Journal — suivi du 2026-10-04

## Décision actuelle : V3 sans Gutenberg

La composition V3 est contrôlée par les templates PHP et le CSS du thème enfant. L'éditeur de blocs est désormais désactivé pour les pages et les articles WordPress ; les articles gardent leur texte dans WordPress, rendu par `the_content()` sous la mise en page de `single.php`. Les anciens blocs stockés en base sont conservés pour réversibilité. Ne pas réenregistrer leur ancien balisage avec l'éditeur classique sans contrôle du rendu.

La page `/faq/` ne lit plus ses blocs ni son shortcode inséré dans le contenu WordPress. Les huit réponses provisoires de `inc/v3/faq.php` sont la source visible par défaut. Les deux patterns FAQ V3 ont été retirés. Pour adopter le plugin après configuration et vérification de ses vraies réponses, basculer l'option WordPress `lmdl_v3_faq_source` de `theme` à `plugin` : le template exécute alors `[structured_faq]` directement. Un résultat vide conserve les réponses du thème sur la page FAQ. Les aperçus des autres pages deviennent de simples liens vers `/faq/` lorsque l'option `plugin` est sélectionnée. Aucun changement de cette option ni des données plugin n'a été fait sur la prévisualisation.

Les sections ci-dessous décrivent la passe précédente, avant cette décision. Leurs contrôles ne valent pas vérification du changement d'éditeur actuel.

Contrôle local de cette correction : PHP lint des quatre fichiers touchés ; le filtre WordPress réel renvoie `false` pour les éditeurs `page` et `post` ; accueil, FAQ et article de démonstration à 375/768/1024/1440 px, avec un H1 par vue, aucun débordement, image cassée ou erreur console. Huit réponses restent visibles sur `/faq/`. Les disclosures de la FAQ, de l'accueil et de l'article s'ouvrent au clavier et conservent le focus. La capture mobile de la FAQ a été revue. Aucun changement DB n'a été effectué pendant ce contrôle.

## Constat avant correction

La FAQ V3 affichait huit réponses provisoires directement dans `partials/v3/faq.php`. Aucune section de réponses n'apparaissait sur l'accueil, le hub ou les pages accompagnements ; seul le menu menait à `/faq/`. Le template `single.php` possédait une typographie de lecture mais une ouverture très verticale, avec le tableau placé après toute la titraille.

Le plugin `structured-faq-manager` est actif sur la prévisualisation, mais son code n'est pas versionné dans le repo (`wp-content/plugins/structured-faq/README.md` est un emplacement réservé). Le diagnostic WP-CLI en lecture seule du run 37196067325 a identifié les shortcodes `structured_faq` et `structured_term_faq`, sans CPT FAQ. Le run 37196165347 a confirmé que les deux shortcodes sans paramètres rendent zéro octet et que la page `/faq/` n'a aucune métadonnée FAQ : il n'y avait donc pas de contenu plugin à afficher. Aucun contenu du plugin ni donnée privée n'a été exporté dans les logs.

## Implémentation

- `inc/v3/faq.php` centralise les huit réponses provisoires et le rendu natif `<details>/<summary>`. Aucun JSON-LD FAQPage n'est émis par le thème.
- La page `/faq/` lit désormais **uniquement** les blocs `core/details` présents dans son contenu WordPress, ou le shortcode `[structured_faq]` / `[structured_term_faq]` s'il y est inséré. Si le contenu choisi est vide, les huit réponses provisoires restent visibles. Le reste de l'ancien pattern V1 n'est pas réinjecté dans la composition V3.
- Deux patterns sont proposés dans Gutenberg : `lmdl/faq-v3-questions` (huit réponses provisoires éditables) et `lmdl/faq-v3-plugin` (shortcode, à utiliser après configuration réelle du plugin). Il faut remplacer le contenu FAQ ancien par le pattern choisi, puis vérifier visuellement et éditorialement le résultat. L'installation du plugin et ses réglages n'ont pas été modifiés.
- L'accueil, le hub et les quatre pages accompagnements possèdent maintenant un aperçu FAQ contextuel avec lien vers `/faq/`. Tant que la source WordPress/plugin n'est pas activée, ces aperçus utilisent la même copie provisoire. Dès qu'une source éditée existe, ils se limitent à un renvoi vers la FAQ pour éviter des réponses divergentes et ne lancent pas le shortcode sur plusieurs pages.
- `single.php` a une ouverture en double page sur desktop, texte avant tableau dans le DOM, puis une mesure de lecture stable. Sa fin reprend le même aperçu FAQ de deux questions et le lien vers toutes les réponses. Une FAQ propre à un article peut aussi être insérée dans le corps Gutenberg avec le bloc natif Détails.

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

Sur `https://lemoulindelaure.fr/` : 12 routes × 375/768/1024/1440, plus l'article de démonstration aux quatre largeurs, soit **52 vues** pour la première mise à jour : un H1 par page, aucun débordement horizontal, image cassée ou erreur console, robots exactement `noindex, follow`. L'accueil, le hub et les quatre univers ont chacun une section FAQ visible ; `/faq/` a huit réponses, zéro JSON-LD FAQPage et un second panneau qui s'ouvre à la barre d'espace avec focus conservé. Les cinq liens contextuels de la page FAQ répondent 200. Dix vues live sans JavaScript (accueil, hub, Terre, Air, FAQ à 390/1440) passent.

Une seconde passe a ajouté deux questions directement après le corps de chaque article : source **`e7583f0`**, snapshot privé **`pre-37198061784`**, déploiement du seul thème **run 37198124869** avec purge LiteSpeed et `PREVIEW_NOINDEX=1`. Les étapes DB ont encore été ignorées. L'article live a été rouvert aux quatre largeurs : une section avec deux réponses, H1 unique, zéro débordement, image cassée, erreur console ou FAQPage ; ouverture à la barre d'espace et focus conservé sur mobile. Captures ignorées sous `.local-wp/review-v3-faq-article-live/`, `.local-wp/review-v3-article-live/`, `.local-wp/review-v3-faq-nojs-live/` et `.local-wp/review-v3-article-faq-final-live/`.

## Prochaine étape éditoriale

Laure relit les huit réponses, puis choisit si elle les maintient en blocs Gutenberg ou si le plugin Structured FAQ devient la source visible. Pour le second choix, configurer les entrées dans le plugin sur la prévisualisation, insérer son shortcode dans le contenu de la page FAQ, vérifier rendu/clavier/schéma, et enlever les doublons de Rank Math. Ne pas activer l'indexation à cette étape.
