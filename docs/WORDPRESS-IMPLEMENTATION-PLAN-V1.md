# WordPress Implementation Plan V1 — Le Moulin de Laure

Status: **foundation + complete V1 page patterns implemented in repository; production content/build not started**

Last updated: 2026-10-02

## Implemented

Theme foundation:
- shared CSS primitives;
- page-family CSS shells;
- conditional enqueueing;
- block-editor styles.

Gutenberg category:
**Le Moulin de Laure**

Registered patterns:
- Split éditorial;
- Processus en 3 étapes;
- Cadre responsable;
- CTA prise de rendez-vous;
- Hero accompagnement;
- Hero accueil;
- Quatre univers.

The Homepage Hero and Four Universes patterns use editor placeholders for images. They do **not** guess the generated door-file mapping.

Repository-only V1 full-page patterns now add:
- `lmdl/homepage-v1`;
- `lmdl/accompagnements-v1`.

They use editable core Group, Heading, Paragraph and Image blocks, child-theme classes, optimized display versions of the four source paintings, and canonical service links. The older placeholder shells remain registered for backward compatibility. `functions.php` loads the page CSS conditionally and adds the scoped `lmdl-page-v1` body class only when the inserted V1 pattern marker is present, releasing Astra's content wrapper width for those compositions. Astra continues to own header, footer and responsive menu.

The real door mapping is resolved in `docs/BRAND-ASSET-MAPPING.md`: three closed universe doors and one shared open passage, with no closed Air door. The V1 panels use a shared arch and four paintings.

## Validation

PHP lint previously passed for:
- `functions.php`;
- `inc/patterns.php`.

Extended pattern file also linted successfully before commit.

## Architecture

Use native Gutenberg content + child-theme patterns/classes.

No page/database content is created by these patterns.

## Next safe step

Door asset mapping remains a visual gate.

The isolated static previews are in `design/prototypes/` with reproducible scripts under `scripts/`. Their responsive/keyboard/reduced-motion review is complete. The next integration step is to insert these patterns in an unpublished local/staging WordPress instance and confirm Gutenberg block validation, Astra wrapper/menu behavior, plugin compatibility and actual link targets. Do not execute on production.

## Pre-content gates

- Communication animale label/slug approved and implemented; verify live redirects only during future staging integration;
- Laila credential wording;
- energetic-service wording;
- guidance intuitive wording;
- operational/pricing details;
- Timetics rules.
