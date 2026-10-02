# Design Progress — Le Moulin de Laure

Last updated: 2026-10-02

## V1 design status

Every public top-level page has V1 UX/content architecture.

No production page implementation has begun.

## SEO milestone

Working V1 complete:
- SERP research;
- intent/page ownership;
- metadata direction;
- internal linking;
- technical SEO/schema/indexation rules.

Files:
- `docs/SEO-SERP-RESEARCH-2026-10-02.md`
- `docs/SEO-STRATEGY-V1.md`
- `docs/SEO-PAGE-MAP-V1.md`

## Implementation-planning milestone

WordPress implementation architecture is documented:
- `docs/WORDPRESS-IMPLEMENTATION-PLAN-V1.md`

Key decision:
**native Gutenberg content + child-theme patterns/classes**, not hardcoded page copy/templates.

Theme audit:
- active brand tokens already exist;
- child README was outdated and is now synchronized;
- current `[lmdl_door]` is a prototype, not final hub;
- current manual GitHub Action can safely deploy child-theme code but not DB content/config.

## Pre-code gates

Resolve:
1. Communication animale vs Communication animalière;
2. exact Laila Del Monte credential wording;
3. energetic-service terminology;
4. whether “guidance intuitive” is approved;
5. service logistics/prices;
6. Timetics availability/cancellation rules.

## Next executable work

Without waiting for final copy, agents can safely start:
- CSS architecture cleanup;
- reusable Gutenberg block-pattern registration;
- non-content-specific layout primitives;
- staging/local homepage component build.

Do not mutate production content/database until naming/content gates are resolved.
