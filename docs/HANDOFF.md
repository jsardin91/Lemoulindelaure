# Handoff / Project State

Last updated: 2026-10-02

## Current milestone

The project now has:
- approved active brand system;
- approved V1 information architecture;
- V1 UX/content design for all public pages;
- qualitative SEO strategy/page map;
- WordPress implementation architecture.

No production page build/content migration has started in this phase.

## Canonical reading order for a new agent

1. `AGENTS.md`
2. `docs/PROJECT.md`
3. `design/brand/BRAND-GUIDELINES-WORKING.md`
4. `docs/SITE-ARCHITECTURE.md`
5. `docs/SEO-STRATEGY-V1.md`
6. `docs/SEO-PAGE-MAP-V1.md`
7. `design-system/MASTER.md`
8. `docs/DESIGN-PROGRESS.md`
9. `docs/WORDPRESS-IMPLEMENTATION-PLAN-V1.md`
10. relevant page wireframe/reference

## Implementation direction

Use:
- WordPress native pages/posts;
- Gutenberg core blocks;
- project block patterns/classes;
- Astra header/footer/native behavior;
- child theme for brand presentation;
- plugins for SEO/forms/booking/privacy.

Do not:
- add a page builder;
- hardcode all page copy into PHP;
- recreate Timetics calendar;
- recreate Forminator form processing;
- modify Astra parent.

## Theme audit

Current child theme already has:
- approved palette;
- approved fonts;
- logo fallbacks;
- art/door assets;
- prototype door shortcode.

The prototype door shortcode is not sufficient for the final four-panel Accompagnements hub.

Current GitHub Action:
`install-child-theme.yml`
works as a manual child-theme deployment with rollback.

It does not deploy database/page content.

## Important unresolved gates

- recommended SEO label/slug change to “Communication animale”;
- exact Laila Del Monte credential;
- energy-service public wording;
- “guidance intuitive” wording approval;
- service logistics/prices;
- Timetics schedule/rules;
- FAQ answers;
- portrait/reviews/Journal/Jardin content.

## SEO trust warning

Do not publish “certifiée par Laila Del Monte” without documentary evidence.

Do not imply Laila Del Monte training covers energetic care or deceased communication.

## Next safe implementation work

Can begin without client-content invention:
- CSS/pattern foundations;
- staging/local component prototypes;
- responsive header/footer;
- homepage visual shell;
- four-universe interaction prototype.

Production DB/page creation waits for naming gates.
