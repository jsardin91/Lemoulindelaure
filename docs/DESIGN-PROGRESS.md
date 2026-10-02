# Design Progress — Le Moulin de Laure

Last updated: 2026-10-02

## Completed in repository

- Brand palette, typography and logo remain approved and active.
- V1 architecture/wireframes and SEO strategy remain the source of page intent.
- All four original paintings and all four door files were visually audited. See `docs/BRAND-ASSET-MAPPING.md` and `design/asset-contact-sheet.png`.
- Two complete, editable native Gutenberg page patterns are registered: `lmdl/homepage-v1` and `lmdl/accompagnements-v1`.
- Homepage has asymmetric painting collage hero, manifesto, four universes, Laure, process, values, Jardin, Journal and FAQ/booking close.
- Accompagnements has a text intro, four adjacent thresholds, orientation links, common values, practical/care boundary and booking close.
- Child-theme CSS supplies the composition and interaction. Astra remains responsible for header/footer and responsive navigation. No page or database was created.
- Isolated static previews live in `design/prototypes/`. Regenerate with `python scripts/build-v1-preview.py` and inspect with `node scripts/review-v1-preview.mjs` (Windows Edge required for the review script). Generated screenshots are ignored by Git.

## Design decisions

- Hero paintings are asymmetric; doors are reserved. In the hub, paintings sit inside a shared arched threshold because Air has no closed door illustration.
- Four hub labels and destinations are always visible. Desktop focus/hover grows one panel to 1.38 relative flex; tablet is 2 × 2; mobile stacks. Reduced motion is static.
- Rejected the thin collapsed rails seen in the 21st Hover Expand preview. Adapted only its focus principle. Adapted editorial hero hierarchy from the 21st Editorial Collage Hero preview; used approved assets and typography.
- Generated 960 px display WebP derivatives; source artworks remain untouched.

## Review and second pass

Visual review at 375, 768, 1024 and 1440 px for both preview pages. Initial issues: mobile hub H1 overflow and desktop hub labels below the initial viewport. Fixed the heading scale, reduced intro height and panel height, then reran captures. Final CDP review reports zero horizontal overflow, zero missing images, zero console errors, 44 px panel link targets, first keyboard Tab to skip link, and desktop focus growth `1.38`. Reduced-motion emulation returned a static layout at all four widths.

PHP 8.4.26 lint passed for `functions.php`, `inc/patterns.php`, `inc/page-patterns.php`. No existing repo test suite was found. `git diff --check` passed.

## Still pending before publication

- Client review/fact check of every public phrase, exact training credential, service logistics/pricing, Timetics setup, and confirmed Journal/FAQ content.
- Integration in a local/staging WordPress installation to validate Gutenberg block round trips and Astra/Timetics/plugin presentation. The isolated preview is not a WordPress runtime.
- No production deploy, Action run or production DB mutation in this phase.
