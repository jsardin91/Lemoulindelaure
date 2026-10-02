# Handoff / Project State

Last updated: 2026-10-02

## Current milestone

Homepage V1 and the Accompagnements hub have repository-only implementations in the Astra child theme. No live WordPress page, database entry, deployment workflow or production file was changed.

## Files to use

- Native Gutenberg full-page patterns: `wp-content/themes/lemoulindelaure-child/inc/page-patterns.php` (`lmdl/homepage-v1`, `lmdl/accompagnements-v1`). Text and images are ordinary editable core blocks once inserted into pages.
- Theme registration, page-specific style loading and Astra content-width class: `wp-content/themes/lemoulindelaure-child/functions.php`.
- Shared primitives: `assets/css/components.css`; page compositions: `assets/css/pages/home.css` and `assets/css/pages/accompagnements.css`.
- Responsive image derivatives: `assets/art/painting-*-display.webp` (960 px maximum); untouched originals remain alongside them.
- Visual proof of asset mapping: `design/asset-contact-sheet.png` and `docs/BRAND-ASSET-MAPPING.md`.
- Isolated previews: `design/prototypes/index.html` and `design/prototypes/accompagnements.html`; generation/review scripts in `scripts/`.

The earlier `lmdl/home-hero-shell` and `lmdl/four-universe-panels` are structural legacy shells. Use the new full-page patterns for the V1 prototype. The current live site has not had these patterns inserted.

## Decisions and references

`Communication animale` and `/accompagnements/communication-animale/` are public and canonical. Door Forest/Terre, Phoenix/Feu and Ocean/Eau are confirmed. Passage is the shared open state. A closed Air door is absent; V1 uses the four paintings in a common arch/frame instead of forcing a fourth door.

21st MCP searches and browser previews used: [Editorial Collage Hero](https://21st.dev/@felipemenezes098/components/hero-04) and [Hover Expand](https://21st.dev/@educalvolpz/components/hover-expand). Only editorial split and modest focus expansion were adapted. Thin collapsed panels and all React/Tailwind dependencies were rejected. Details are in `design/references/21ST-HOMEPAGE-REFERENCES.md` and `design/references/21ST-ACCOMPAGNEMENTS-REFERENCES.md`.

UI/UX Pro Max checks informed keyboard/focus, 44 px targets, image dimensions, breakpoints, motion and overflow. Taste Skill guided asymmetry, real art, visible hero CTA and varied section rhythm. Frontend Design Pro guided the evolve-in-place CSS architecture.

## Verification

Run:

```text
python scripts/build-v1-preview.py
node scripts/review-v1-preview.mjs
```

The review uses isolated Edge headless emulation at 375/768/1024/1440 px. Second pass passed for both pages: no overflow or missing images; panel links at least 44 px; no console errors; skip link receives first Tab; focus growth works on desktop; reduced-motion layout remains complete. PHP 8.4.26 `-l` passed on all three child-theme PHP files. No existing test suite was found. The review generated PNGs are ignored by Git.

**Limit:** no local/staging WordPress instance was available, so actual Gutenberg serialization, Astra template rendering, plugin integration, runtime PHP errors and destination-page HTTP status were not exercised. The isolated preview mimics the Astra header/footer and tests child-theme sections; it does not replace a WordPress integration check.

## Next exact step

Create two unpublished pages in a local/staging WordPress install, insert the corresponding V1 patterns, set the Homepage as front page, and check block validity, Astra header/mobile menu, actual internal destinations, Rank Math, Timetics and real page speed. Collect client-approved copy, credential proof, service logistics, FAQ answers and Journal articles before any public publication. Do not deploy until a separate production decision.
