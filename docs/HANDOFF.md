# Handoff / Project State

Last updated: 2026-10-03

## Latest follow-up: Butterfly door on V3

`origin/main` added the closed Butterfly door after V3 was deployed (`46ec2d4`). This V3 branch imports its master and WebP without merging the rest of main's V1 portal component. The theme now uses a transparent cutout of that door for Air on Homepage, hub and the Guidance page; source export and master are preserved. `scripts/build-v3-derived.py` reproduces the cutout from `door-butterfly.webp` and the existing Ocean alpha mask. The old CSS-only Air frame is removed. Source `0dc1e64` was deployed to `https://lemoulindelaure.fr/` with private rollback `pre-37122618592` and successful workflow 37122668164; the public preview remains `noindex, follow`. The 48 live views, no-JS and keyboard regression passed. See [BRAND-ASSET-MAPPING.md](BRAND-ASSET-MAPPING.md), [BRAND-ASSET-USAGE-V3.md](BRAND-ASSET-USAGE-V3.md) and [V3-PREVIEW-DEPLOYMENT-REPORT.md](V3-PREVIEW-DEPLOYMENT-REPORT.md) for provenance, QA and rollback. The earlier V3 state below describes the first deployment.

## Current state: V3 editorial portals

Branch `redesign/editorial-portals-v3` starts at exact V2 HEAD `0bfefe4bbd0fed21592d9d61e88f5606a3fe5ec5`. The V3 thesis is a painted book with four navigable doors. `inc/v3/content.php` is the structured content layer, `inc/v3/render.php` routes the nine art-directed pages, `partials/v3/` gives each world a composition, `assets/v3/` holds CSS and optional small JS, and `header-v3.php`/`footer-v3.php` provide the site shell. `templates/lmdl-page-v1.php` remains the assigned WP page template but no longer renders old blocks for the nine art-directed pages; the database content is untouched for rollback. Contact/booking/FAQ still use their WP/plugin content. Single Journal posts retain native WordPress content. The four portals and asset provenance are in [BRAND-ASSET-USAGE-V3.md](BRAND-ASSET-USAGE-V3.md); design/interaction rationale in [ART-DIRECTION-V3.md](ART-DIRECTION-V3.md) and [V3-INTERACTION-ARCHITECTURE.md](V3-INTERACTION-ARCHITECTURE.md).

Local review passed 48 responsive views plus no-JS Homepage/hub/Terre and keyboard/reduced-motion checks. Final theme source `b9cdd6e` is deployed to `https://lemoulindelaure.fr/` after private backups `pre-37120600151` (V2) and `pre-37121213664` (V3 before Journal polish); final deployment run 37121264221 purged LiteSpeed. Live QA repeated the 48 views after both deployments and no-JS/keyboard/links checks with exact `noindex, follow`, no overflow, broken image or console error. Rollback and evidence are recorded in [V3-PREVIEW-DEPLOYMENT-REPORT.md](V3-PREVIEW-DEPLOYMENT-REPORT.md). **Keep the public preview `noindex, follow`; do not remove it for this milestone.** Next step after V3 visual acceptance: collect Laure's fact-checked service copy, training evidence, operational details, FAQ, Journal content and portrait; configure/verify Forminator, Timetics, consent and Rank Math before any indexation decision.

The V2 section below describes the previous preview only.

## Current state: V2 art direction on the public noindex preview

The owner rejected the V1 visual composition and authorized an art-directed V2. Work is on `redesign/art-direction-v2`; the tested child theme is deployed at `https://lemoulindelaure.fr/` from source `9743558`. The four original paintings now form the hero and four full-width narrative chapters; a custom header/footer removes Astra's generic appearance without altering its parent. All 12 routes remain HTTP 200 with `noindex, follow`, and the physical `robots.txt` allows crawling of those tags. **Do not remove noindex yet.** The pre-V2 private rollback snapshot is `pre-37115809404` (backup run 37115809404); the final theme deployment and cache purge is run 37115998942. Full QA and rollback are in [V2-PREVIEW-DEPLOYMENT-REPORT.md](V2-PREVIEW-DEPLOYMENT-REPORT.md); design decisions are in [ART-DIRECTION-V2.md](ART-DIRECTION-V2.md).

The homepage, hub and four service compositions are loaded from versioned HTML in `wp-content/themes/lemoulindelaure-child/assets/v2/` by `inc/v2.php`, through the existing assigned page-template path. Other page content remains in Gutenberg, with a V2 header/footer and editorial style; native articles use the same shell. Editing old Gutenberg blocks on the six art-directed pages will **not** change their visible V2 text. Edit the versioned HTML/variant data and redeploy the child theme for those pages, or later add deliberate CMS fields without weakening the design. No production DB page content was changed by V2. The exact next step is to collect the client-approved content and configure Forminator, Timetics, consent and SEO, then repeat route, visual, a11y and performance checks before any indexation decision.

The V1 sections below are historical and describe the state before the V2 owner decision.

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
# 2026-10-03 — V3 addendum handoff

The current branch adds the first-person editorial revision, six-link desktop header with accessible service submenu, redesigned footer and V3 native-plugin envelopes. Backup `pre-37127265874`, guarded plugin/Astra run `37127485364`, Timetics UI polish run `37127901152` and final nine-color sync run `37128150718` passed. Live browser QA covered 12 routes × four widths, `noindex, follow`, links, Forminator validation and computed colors; see `docs/V3-ADDENDUM-IMPLEMENTATION.md`. The final run reused the existing plugin IDs and purged cache. The earlier automatic reviewer rejected a sensitive backup step; `wp-config.php` has been removed from that workflow. Keep `lmdl_preview_noindex=1` until a separate publication decision.
