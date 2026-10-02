# WordPress Implementation Plan V1 — Le Moulin de Laure

Status: **foundation + structural Gutenberg patterns implemented in repository; production content/build not started**

Last updated: 2026-10-02

## Implemented

Theme foundation:
- shared CSS primitives;
- page-family CSS shells;
- conditional enqueueing;
- editor styles.

Gutenberg pattern infrastructure:
- category **Le Moulin de Laure**;
- Split éditorial;
- Processus en 3 étapes;
- Cadre responsable;
- CTA prise de rendez-vous;
- Hero accompagnement.

Files:
- `inc/patterns.php`
- `assets/css/editor.css`

Patterns are deliberately structural:
- editable;
- neutral placeholder copy;
- editor-only placeholder notes are hidden on the public site.

No WordPress page/database content is created by this code.

## Validation

Local PHP lint:
- `functions.php`: PASS
- `inc/patterns.php`: PASS

## Architecture

Use native Gutenberg content + child-theme patterns/classes.

Do not:
- hardcode all page copy in PHP;
- add a page builder;
- recreate Timetics/Forminator behavior;
- modify Astra parent.

## Next safe code step

1. verify generated door assets visually and map them to universes;
2. create the coordinated four-universe Gutenberg pattern;
3. create homepage hero/collage pattern shell;
4. then prototype pages in a non-production/staging context.

## Pre-content gates

- Communication animale naming/slug;
- Laila credential wording;
- energetic-service wording;
- guidance intuitive wording;
- operational/pricing details;
- Timetics rules.
