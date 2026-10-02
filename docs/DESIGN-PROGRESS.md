# Design Progress — Le Moulin de Laure

Last updated: 2026-10-02

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
