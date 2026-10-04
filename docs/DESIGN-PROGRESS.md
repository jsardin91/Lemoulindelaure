# Design Progress — Le Moulin de Laure

Last updated: 2026-10-03

## V3 Butterfly door integration — current follow-up

The newly added `door-butterfly-master.png` and `door-butterfly.webp` from `origin/main` were visually compared with Forest, Phoenix and Ocean. The new export has an opaque dark surround, so the V3 theme keeps it unchanged and generates a transparent cutout using the Ocean door's matching alpha silhouette. Homepage, hub and Air now use this Butterfly threshold in place of the temporary CSS-only frame; Passage remains the common open transition. Source `0dc1e64` is deployed to the noindex preview after private backup `pre-37122618592`; run 37122668164 succeeded and purged LiteSpeed. Live review passed 48 responsive views and no-JS/keyboard checks. Details are in [V3-PREVIEW-DEPLOYMENT-REPORT.md](V3-PREVIEW-DEPLOYMENT-REPORT.md). The V3 original milestone below remains historical context.

## V3 editorial portals — current milestone

The V3 child-theme frontend is implemented on `redesign/editorial-portals-v3` from the exact V2 live source. It replaces V2's repeated painted chapters with an open Passage and four navigable threshold compositions. The first V3 had three illustrated doors and a temporary CSS-only Air portal; the follow-up above replaces the latter with the new Butterfly door. Nine art-directed pages are server-rendered from structured content/partials, while functional pages retain their WordPress/plugin content. Homepage, hub, Terre and Air were first inspected at 1440/390; a composition pass corrected the lower Homepage spreads, and a second interaction pass made the doors keyboard/touch links, fixed heading levels and reduced image priority requests.

Local WordPress review: 12 routes × 375/768/1024/1440, one H1 each, no horizontal overflow, broken loaded image or console error. No-JS DOM and opening screenshots pass on Homepage, hub and Terre; first Tab, native mobile menu, eight hub links and reduced motion pass. The V3 preview is deployed from final theme source `b9cdd6e` on `https://lemoulindelaure.fr/` after private backups `pre-37120600151` (V2) and `pre-37121213664` (V3 avant polish). Final deployment run 37121264221 purged LiteSpeed and retained the preview noindex option. Live review repeated all 48 views after each deployment with exact `noindex, follow`, no overflow/broken image/console error; no-JS, links, keyboard and reduced motion also passed. Details and evidence: [ART-DIRECTION-V3.md](ART-DIRECTION-V3.md), [V3-INTERACTION-ARCHITECTURE.md](V3-INTERACTION-ARCHITECTURE.md) and [V3-PREVIEW-DEPLOYMENT-REPORT.md](V3-PREVIEW-DEPLOYMENT-REPORT.md). V2 and V1 milestones below are historical.

## V2 painted editorial experience — current milestone

The owner rejected V1 art direction and authorized a complete visual redesign, retaining the approved brand foundations. Three 1440/390 static directions were compared; the selected “painted book to move through” combines the collage opening, art-book typography and four distinct narrative chapters. Homepage, hub and the four service views now use art-directed child-theme compositions. A custom header/footer and V2 editorial rules extend to Jardin, About, Journal, FAQ, Contact, Booking and native articles. There are no equal service cards, stock images, fake articles, prices or credentials. The full critique, 21st previews, choices and two polish rounds are in [ART-DIRECTION-V2.md](ART-DIRECTION-V2.md).

The V2 child theme is live on the public **noindex preview** at `https://lemoulindelaure.fr/`. A private pre-V2 rollback snapshot `pre-37115809404` was verified; the final theme deployment run 37115998942 purged LiteSpeed after preserving `lmdl_preview_noindex=1`. Live QA covered 48 responsive views and all 12 routes with `noindex, follow`, no overflow, broken images or console errors; mobile menu, first Tab, reduced motion and service links pass. Lab LCP/CLS values and limitations are recorded in [V2-PREVIEW-DEPLOYMENT-REPORT.md](V2-PREVIEW-DEPLOYMENT-REPORT.md). Earlier V1 sections below are historical.

## Public preview V1 — current milestone

The owner authorized the main-domain preview on 2026-10-03. The Homepage, hub, four service pages, Jardin, About, Journal, FAQ, Contact and Booking now use the reviewed Gutenberg patterns on `https://lemoulindelaure.fr`; the child theme is active and Astra still renders header, menus and footer. All twelve pages are temporarily noindex. The live first pass found stale LiteSpeed HTML and 403 theme assets; explicit purge and 755/644 extraction permissions fixed both. The second pass found generic Astra footer credit, premature Contact/Booking language and stored HTTP artwork URLs; the native Astra footer/menu, page patterns and HTTPS serialization were corrected. All twelve paths now return 200/noindex.

The final live browser pass covered 48 views at 375/768/1024/1440 under reduced motion. It found no horizontal overflow, missing image or frontend console error; each page has one H1. Full-size captures of the core pages were inspected. A physical `robots.txt` was corrected to `Allow: /` while every page kept `noindex, follow`, so crawlers can read the tags. No 21st/React/Tailwind code was deployed; the earlier 21st visual references and approved Master System still govern the composition. Detailed run IDs, backups, rollback, results and client-only gaps: [PRODUCTION-PREVIEW-DEPLOYMENT-REPORT.md](PRODUCTION-PREVIEW-DEPLOYMENT-REPORT.md). The sections below document earlier local milestones.

## Functional pages V1 — current milestone

The validated editorial branch was merged into `main` at `ad34f1206cd8b38bfb44ca14d9af86b4a07b867d`. `feat/functional-pages-v1` now contains editable FAQ, Contact/Forminator and Booking/Timetics patterns plus receipt patterns, scoped CSS and site-local plugin ID options. The local test exercised a true Forminator error → correction → inline success flow and a Timetics TEST LOCAL service → date → slot → form → native confirmation flow.

First visual pass found Timetics' white card wall/blue default buttons and undersized form labels. The second pass changed the meeting list to brand-consistent ruled rows and improved field/target styling. The 375/768/1024/1440 review found no horizontal overflow or missing loaded image on the three pages; receipt pages were also checked at 375/1440. All 90 functional Gutenberg blocks were valid with two edit/save/reload cycles per page. 21st previews were visually compared and adapted only for FAQ rhythm, form brevity and booking hierarchy; no component code was copied. Full test evidence and plugin limits: `docs/FUNCTIONAL-PAGES-INTEGRATION-REPORT.md`.

FAQ answers, real service/booking terms, verified notifications, legal consent, French plugin UI and Rank Math sitemap setup remain staging gates. The complete one-pass Laure questionnaire is `docs/CLIENT-CONTENT-QUESTIONS.md`; staging actions are in `docs/STAGING-READINESS-CHECKLIST.md`. No production change or deployment occurred.

## Editorial pages V1 — current milestone

The validated four-page accompaniment branch was fast-forwarded into `main` and pushed at `7232f079a41a15949fc23d42667c40045a408ca3`. On `feat/editorial-pages-v1`, Le Jardin, À propos and Journal now have editable native Gutenberg full-page patterns, and native posts use a quiet `/journal/[slug]/` reading template. Journal's six-post Query Loop, pagination and empty state update as posts change. No public Jardin profile or article is invented.

The first rendered pass found a local starter post in Journal, English pagination and stiff training copy. Those were corrected; the second pass reopened all four views at 375/768/1024/1440 px. All 114 editorial blocks validate after multiple save/reload cycles; no tested view has overflow, a broken loaded image, console error or route 404. Keyboard focus and reduced motion pass. Existing Homepage/hub and four service pages passed regression review. Visual choices, 21st previews, fixture isolation and remaining content gates are recorded in `docs/EDITORIAL-PAGES-INTEGRATION-REPORT.md`. No production change was made.

## Four accompaniment pages V1 — previous milestone

The validated Homepage/hub branch was fast-forwarded into `main` at `25bbbd12892f876f92254e959bf9c34c2d49db6b`. On `feat/accompaniment-pages-v1`, four editable full-page Gutenberg patterns now provide distinct Terre, Feu, Eau and Air service pages. Shared CSS and the original paintings preserve the approved visual system. Feu remains intentionally concise; no missing service details were invented. The public communication label is **Communication animale**.

The first visual pass found the Feu title wrapping badly, an Eau heading with insufficient contrast and internal-status copy in public view. All were corrected. The second WordPress pass covered 16 views at 375/768/1024/1440 px: no overflow, missing art or console errors; 265 valid blocks; keyboard-visible CTA focus; no mandatory motion; and all tested routes returned 200. Each page passed two text edit/save/reload cycles plus title, image and section reordering. Full results, 21st references and content gates: `docs/ACCOMPANIMENT-PAGES-INTEGRATION-REPORT.md`.

## Completed

- Approved palette, typography, logo and active `design-system/MASTER.md` remain unchanged.
- Original paintings and door files were visually audited; see `docs/BRAND-ASSET-MAPPING.md` and `design/asset-contact-sheet.png`.
- Native editable patterns `lmdl/homepage-v1` and `lmdl/accompagnements-v1` now have a valid real Gutenberg parse/save cycle. Homepage contains collage hero, manifesto, four universes, Laure, process, values, Jardin, Journal and FAQ/booking close. The hub contains four adjacent thresholds, orientation, values, practical boundary and booking close.
- Four 960 px WebP display derivatives reduce artwork weight while preserving the original paintings.
- Both pages were inspected in real WordPress 7.1.2 with Astra 4.14.0 and the child theme at 375/768/1024/1440 px. See `docs/WORDPRESS-INTEGRATION-REPORT.md`.

## Design decisions and second pass

The hero uses asymmetric original art; the doors stay secondary. The hub uses a common continuous frame around the four paintings because Air has no closed door. Earth/Fire/Water/Air labels, services and links are always visible. Desktop focus/hover grows one panel by 1.38 flex factor; tablet is 2 × 2; mobile stacks; reduced motion is static.

The first WordPress pass exposed Astra's wrapping desktop menu at 1024 px, extra mobile page/section insets and generic separated panel boxes. A native Astra tablet breakpoint adjustment, explicit V1 page template, wrapper spacing fixes and continuous panel borders resolved those issues. The second pass restored the mobile hub title to one line, kept the hero CTAs in the opening viewport and confirmed the panel link targets are 44 px or more. Editor screenshots show a usable approximation of the frontend.

21st references actually adapted: [Editorial Collage Hero](https://21st.dev/@felipemenezes098/components/hero-04) for asymmetric editorial balance and [Hover Expand](https://21st.dev/@educalvolpz/components/hover-expand) for moderate focus expansion. Thin collapsed rails, generic card grids and 21st implementation code were rejected. UI/UX Pro Max checked responsive behavior, focus, targets and image loading; Taste Skill checked composition and anti-generic rhythm; Frontend Design Pro guided the child-theme implementation.

## Verification

Real WordPress: 104/104 Homepage and 67/67 hub blocks valid; two paragraph edit/save/reload cycles plus title/image/section-move cycles pass on each page. One H1 per frontend page; no overflow, missing image, frontend console error or internal 404 at the four widths. Skip link is the first keyboard Tab, menu expands, focus is visible, reduced motion has zero transition, and local CLS stayed at or below 0.05. Five requested plugins activated locally. PHP lint passed on four child-theme PHP files; existing preview build and eight-view browser review passed.

## Remaining before publication

Client review/fact check of all provisional text; exact Laila credential wording; service logistics/pricing; real FAQ and Journal content; configured Timetics, Forminator, Complianz and Rank Math metadata; staging verification with real plugin content and production-like caching. No production deploy, GitHub Action or live DB change was made.
# 2026-10-03 — V3 addendum

Implemented first-person copy, asset-caption cleanup, complete V3 header, editorial footer, V3 Contact/Booking partials and scoped plugin styling. Added guarded local preview configuration for Forminator, Timetics and Astra palette. Second local responsive pass corrected Contact overflow at 375 px; 48 route/width checks passed. See `docs/V3-ADDENDUM-IMPLEMENTATION.md` for tests, deployment gate and remaining live QA.

Live preview deployed with backup `pre-37127265874`; final source/configuration run `37128150718` passed. The public domain retained `noindex, follow`. Live QA covered 48 route/width views, working internal links, French Forminator validation and the exact official Astra palette. Timetics' four native preview entries remain visible with their unusable booking controls hidden until real availability and staff details are confirmed. The handoff and implementation report record the remaining content gates.

Follow-up: the complete desktop header now shares one row with the booking CTA from 1024 px. Local geometry and a 1024 px screenshot were checked before publication; the compact menu remains below that width.

Published after backup `pre-37141470900` via theme run `37141539393`. Live 1024 px capture and desktop geometry confirm the complete menu and CTA in one line; focus opens the four service links.

2026-10-04 footer polish: the complete logo image already includes “Au cœur du lien, au-delà des sens.” Removed the redundant line below it and the duplicate at the footer bottom, then adjusted mobile spacing. Local visual checks at 375/1440 px show the artwork and footer hierarchy remain clear.

Live preview verified after backup `pre-37186956057` and theme run `37187015854`: footer screenshots at 375/1440 px, responsive geometry through 1600 px, keyboard submenu, PHP lint, and HTTP 200 with `noindex, follow` passed. No plugin or content change.
