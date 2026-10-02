# Handoff / Project State

Last updated: 2026-10-02

## Current milestone

Homepage V1 and the Accompagnements hub are implemented as editable native Gutenberg patterns in the Astra child theme and were **integrated in an isolated local WordPress 7.1.2 + Astra 4.14.0 instance**. This was a repository/local milestone: no live page, production database, deployment workflow or Astra parent file was changed. The full evidence, plugin versions, tests and limitations are in [WORDPRESS-INTEGRATION-REPORT.md](WORDPRESS-INTEGRATION-REPORT.md).

## Files and architecture

- Full-page core-block patterns: `wp-content/themes/lemoulindelaure-child/inc/page-patterns.php` (`lmdl/homepage-v1`, `lmdl/accompagnements-v1`). Text and images are directly editable after insertion.
- Select **LMdL — Page V1** in the editor for each page. `templates/lmdl-page-v1.php` delegates to Astra's `page.php`; `functions.php` scopes the `lmdl-page-v1` body class, title suppression and conditional CSS by this template. Content-string detection was removed.
- `style.css` holds approved tokens/fonts and header sizing. `assets/css/components.css` has shared primitives and Astra wrapper adjustments; `assets/css/pages/home.css` and `assets/css/pages/accompagnements.css` own the two layouts. `functions.php` adds intrinsic dimensions to known bundled art when rendering valid core/image blocks.
- Display assets: `assets/art/painting-*-display.webp`; source art remains untouched. Mapping proof: `design/asset-contact-sheet.png` and `docs/BRAND-ASSET-MAPPING.md`.
- Isolated static previews: `design/prototypes/index.html` and `design/prototypes/accompagnements.html`; regenerate/review with `python scripts/build-v1-preview.py` and `node scripts/review-v1-preview.mjs`.

The older `lmdl/home-hero-shell` and `lmdl/four-universe-panels` are legacy structural shells. Use the new full-page patterns. No production pages have been created from them.

## Design and source decisions

`Communication animale` with `/accompagnements/communication-animale/` is the public wording. The door audit found Forest/Terre, Phoenix/Feu, Ocean/Eau and one shared open Passage, with no closed Air door. The V1 hub therefore uses all four paintings in a single adjacent threshold frame; the doors remain secondary editorial assets.

21st previews used were [Editorial Collage Hero](https://21st.dev/@felipemenezes098/components/hero-04) and [Hover Expand](https://21st.dev/@educalvolpz/components/hover-expand). Only their editorial split and modest focus expansion concepts were adapted. No React/Tailwind/21st code was embedded. The approved palette, typography and logo remain active. UI/UX Pro Max, Taste Skill and Frontend Design Pro informed the two visual passes.

## Verified and remaining

In actual WordPress, all **104 Homepage and 67 hub blocks validate**. Two edit/save/reload passes plus title, image and section-move tests succeeded for each page. Astra header/menu/footer, routes, responsive views at 375/768/1024/1440, skip link, focus, reduced motion, image dimensions, frontend console and conditional CSS were checked. All internal local routes returned HTTP 200. The PHP files lint, and existing preview tests pass. The five requested plugins were installed and activated in the local test only; unconfigured booking, forms, consent and production cache behavior remain to be validated when real client inputs exist.

The client must still verify public copy and provide exact credential wording, service operations/prices, FAQ/Journal content and plugin configuration. The next safe step is **branch review/merge of the code only**, then a separate staging content/integration phase. Do not deploy or run the production workflow as part of this milestone.
