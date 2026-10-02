# WordPress Implementation Plan V1 — Le Moulin de Laure

Status: **foundation + structural Gutenberg patterns implemented in repository; production content/build not started**

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

After mapping:
- attach exact door/painting assets to the four-universe composition;
- prototype homepage and Accompagnements in staging/local;
- run keyboard/responsive/reduced-motion QA.

## Pre-content gates

- Communication animale naming/slug;
- Laila credential wording;
- energetic-service wording;
- guidance intuitive wording;
- operational/pricing details;
- Timetics rules.
