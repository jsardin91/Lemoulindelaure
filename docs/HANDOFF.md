# Handoff / Project State

Last updated: 2026-10-03

## Current state: V1 public preview on the main domain

The owner explicitly authorized a public, temporarily noindex preview on the main PlanetHoster WordPress domain on 2026-10-03. The twelve V1 pages, static Homepage, Astra navigation/footer and child-theme design are live at `https://lemoulindelaure.fr`. The default WordPress sample page/post were drafted after fingerprint checks. `blog_public=1` keeps `robots.txt` crawlable; the child-theme preview option makes all twelve tested pages emit `noindex, follow`. Contact and Timetics are intentionally unavailable pending verified client configuration. No TEST LOCAL fixtures or private client data were imported. The active code and full execution/rollback/QA evidence are in [PRODUCTION-PREVIEW-DEPLOYMENT-REPORT.md](PRODUCTION-PREVIEW-DEPLOYMENT-REPORT.md).

Pre-V1 private backup: `pre-37110295574`; final post-V1 private backup: `pre-37113063801`. Both are on the PlanetHoster account outside webroot. Do not commit/export them. The theme and content deployment workflows in `.github/workflows/` are manual only; the content installer is `scripts/apply-production-preview.php`. Running it without `refresh_content` preserves populated pages, while the explicit refresh flag overwrites only pages marked with their LMdL pattern. The last theme deployment was run 37112230875; the final content/noindex option application was run 37112736055; the physical robots fix was run 37112923291. The next concrete step is client-supported Forminator/Timetics and legal/SEO setup, then a fresh 375/768/1024/1440 and keyboard review. Keep noindex until content, consent, metadata and journeys are approved.

The sections below are historical local milestones. Their older staging/no-deploy instructions describe the state before the owner's 2026-10-03 decision and do not describe the current preview.

## Current milestone: functional pages V1

The reviewed editorial branch was fast-forwarded into `main` and pushed at `ad34f1206cd8b38bfb44ca14d9af86b4a07b867d`; no deployment workflow file changed or deployment was run. The current review branch is `feat/functional-pages-v1`, created from that main. It adds editable native patterns for FAQ, Contact, Booking, Merci and reservation confirmation; site-option-backed Forminator/Timetics shortcode wrappers; scoped functional CSS; and noindex/sitemap fallbacks. No live WordPress data or Astra parent file was changed.

The isolated local WordPress tested the Forminator empty/invalid/corrected/success flow and Timetics TEST LOCAL service/date/slot/form/confirmation flow. Gutenberg validated 32 FAQ, 20 Contact and 38 Booking blocks with two save/reload text passes each. Twelve required responsive views plus four receipt views passed; Timetics' initial generic cards were corrected in a second visual pass. WordPress core receipt sitemap exclusion and noindex worked locally; Rank Math sitemap and Complianz banner remain unconfigured in the fixture. Timetics' English UI and unverified email promise are staging gates. Exact evidence and limits: [FUNCTIONAL-PAGES-INTEGRATION-REPORT.md](FUNCTIONAL-PAGES-INTEGRATION-REPORT.md).

The single client collection document is [CLIENT-CONTENT-QUESTIONS.md](CLIENT-CONTENT-QUESTIONS.md); the current environment gate is described in [STAGING-READINESS-CHECKLIST.md](STAGING-READINESS-CHECKLIST.md).

## New milestone: Jardin, À propos, Journal and article V1

`feat/accompaniment-pages-v1` was verified, fast-forwarded into `main` and pushed at `7232f079a41a15949fc23d42667c40045a408ca3`. The current branch is `feat/editorial-pages-v1`, based on that main; leave it separate for review. It adds `lmdl/le-jardin-v1`, `lmdl/a-propos-v1`, `lmdl/journal-v1` and optional hidden `lmdl/jardin-profile-entry` in `inc/editorial-page-patterns.php`. Insert a full-page pattern on each matching page and select **LMdL — Page V1**. `assets/css/pages/editorial.css` is conditionally loaded. Native Journal posts use `single.php`, `/journal/[slug]/`, one dynamic six-post Query Loop and native pagination/empty state. Flush permalinks once after installing this code on staging.

The isolated WordPress fixture validated all 114 editorial blocks and save/reload edit cycles. The four views each passed 375/768/1024/1440 px, focus/reduced-motion/console/routes checks and a second visual pass. Query Loop create/delete/empty behavior and earlier page regressions passed. Full setup, 21st references, tests and limits: [EDITORIAL-PAGES-INTEGRATION-REPORT.md](EDITORIAL-PAGES-INTEGRATION-REPORT.md). The local fixtures are ignored and must not be published. Remaining inputs: consented Jardin profiles, Laure portrait, exact training evidence, approved public copy, real Journal posts/images/author, and staging Rank Math metadata/schema/canonical checks. No production deployment or database change occurred. The next step is **review this branch, then integrate approved content and SEO on staging**.

## Previous milestone: four service pages V1

The validated foundation branch was fast-forwarded to `main` and pushed at `25bbbd12892f876f92254e959bf9c34c2d49db6b`. The completed `feat/accompaniment-pages-v1` branch was subsequently merged into `main` at `7232f079a41a15949fc23d42667c40045a408ca3`. Four full-page Gutenberg patterns in `inc/accompaniment-page-patterns.php` now cover Communication animale, Accompagnement énergétique animalier, Connexion avec les défunts and Guidance pour soi. Select **LMdL — Page V1** for each. `assets/css/pages/accompaniment-detail.css` is the shared style; `functions.php` loads it conditionally on the four canonical slugs. Text, artwork, title and section order are editor-owned. No production data was changed.

The local WordPress/Astra/Gutenberg integration passed 265/265 valid blocks, text/image/title/section save cycles, 16 responsive views, keyboard focus, reduced motion, route, PHP and existing preview checks. The first visual pass was corrected and reopened. See [ACCOMPANIMENT-PAGES-INTEGRATION-REPORT.md](ACCOMPANIMENT-PAGES-INTEGRATION-REPORT.md) for the exact evidence, 21st previews, design decisions and client content gaps. Laure's missing service facts and copy approval are still needed before staging content integration.

## Earlier foundation milestone

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

The client must still verify public copy and provide exact credential wording, service operations/prices, FAQ/Journal content and plugin configuration. See the current preview section and deployment report above for the live state and next step.
