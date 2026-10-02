# WordPress Implementation Plan V1 — Le Moulin de Laure

Status: **foundation implementation started; production content/build not started**

Last updated: 2026-10-02

## Implemented in repository

Non-content-specific theme foundation now includes:
- shared CSS primitives: `assets/css/components.css`;
- homepage shell: `assets/css/pages/home.css`;
- Accompagnements four-panel shell: `assets/css/pages/accompagnements.css`;
- shared detail-page shell: `assets/css/pages/accompaniment-detail.css`;
- editorial pages shell: `assets/css/pages/editorial.css`;
- FAQ/contact/booking shell: `assets/css/pages/functional.css`;
- conditional enqueue logic in `functions.php`.

Nothing in this foundation creates or modifies WordPress pages/database content.

The current `[lmdl_door]` shortcode remains explicitly marked as a legacy prototype.

## Architecture decisions

Use native Gutenberg content + child-theme patterns/classes.

Do not:
- hardcode all page copy in PHP;
- add a page builder;
- recreate Timetics/Forminator behavior;
- modify Astra parent.

## Next code step

Register reusable Gutenberg block patterns using the new CSS classes.

Safe first patterns:
- editorial split;
- process line;
- responsible boundary;
- CTA group;
- accompaniment hero shell.

Homepage/four-universe patterns should be added after visual asset mapping is verified.

## Pre-content gates remain

1. Communication animale naming/slug;
2. Laila credential wording;
3. energetic-service wording;
4. guidance intuitive wording;
5. operational/pricing details;
6. Timetics rules.
