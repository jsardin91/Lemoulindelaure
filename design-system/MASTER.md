---
status: active
brand: "Le Moulin de Laure"
last_reviewed: 2026-10-03
---

# Le Moulin de Laure — Master Design System

> **ACTIVE.** Palette, typography and logo rules were explicitly approved by the project owner on 2026-10-02. Future agents must preserve these foundations unless a later explicit decision supersedes them.

## V2 art direction override — 2026-10-03

The owner rejected the V1 composition and authorized a complete visual redesign. The approved palette, Lora/Source Sans 3 and original logo remain active. For the public site, the new thesis is **a painted book to move through**: the four original works set composition, crop, scale and chapter rhythm. See `../docs/ART-DIRECTION-V2.md` for prototypes, 21st previews, implementation and visual QA. The earlier “four equal gateways/panels” guidance below is historical V1 guidance and must not be recreated as cards or a four-column service grid. The common door motif is a passage language; there is no fourth closed Air door.

## Brand foundations

Brand: Le Moulin de Laure

Signature:

**Au cœur du lien, au-delà des sens.**

The experience combines:
- living beings and animals;
- connection and communication;
- softness and empathy;
- color and energy;
- grounded professionalism.

The site must not drift into an overly mystical or generic AI aesthetic.

Canonical client guidance: `../design/brand/BRAND-GUIDELINES-WORKING.md`.

## Visual thesis

Handmade painted imagery, a cream/paper ground, deep blue writing, restrained gold details and expressive but calm visual gateways.

The four animal paintings and the door motif create recognizable universes around clear, readable HTML content.

The site should feel:
- joyful;
- gentle;
- humane;
- colorful;
- grounded;
- professional;
- emotionally safe.

## Color system — APPROVED

| Role | Hex | Usage |
| --- | --- | --- |
| Cream | `#FAF7EF` | Main background |
| Paper | `#FFFDF8` | Raised surface |
| Ink | `#173F54` | Headings and body |
| Moulin blue | `#165A77` | Links and primary actions |
| Teal | `#306C67` | Secondary actions and accents |
| Leaf green | `#426F47` | Accent on light ground |
| Antique gold | `#B68631` | Illustration, border and large ornament; not small text on cream |
| Lavender | `#666294` | Accent |
| Line | `#DCD4BD` | Neutral separation |

Implementation references:
- `wp-content/themes/lemoulindelaure-child/style.css`
- `wp-content/themes/lemoulindelaure-child/theme.json`

Do not replace the palette with tool-generated colors.

## Typography — APPROVED

- **Lora 600** — headings
- **Source Sans 3 400** — body copy
- **Source Sans 3 600** — UI controls/emphasis

Fonts are self-hosted in the child theme.

The logo lettering is artwork and must not be recreated with these fonts.

Details/history: `TYPOGRAPHY-BENCHMARK.md`.

## Logo system — APPROVED

Master source:
- `design/brand/source/logo-client-original.jpeg`

Approved production variants:
- `logo-complet-transparent.png`
- `logo-complet-creme.webp`
- `logo-horizontal-transparent.png`
- `embleme-transparent.png`
- `signature-transparent.png`
- `devise-transparent.png`
- `icone-32.png`
- `icone-180.png`
- `icone-512.png`

Production location:
- `wp-content/themes/lemoulindelaure-child/assets/logo/`

Rules:
- preserve proportions;
- never stretch/distort;
- no arbitrary recoloring;
- no retyping/redrawing;
- no unapproved effects;
- horizontal version for compact horizontal contexts;
- full version for larger brand moments;
- emblem/icons for favicon/site-icon contexts;
- signature/devise are supporting editorial assets;
- maintain breathing room.

## Imagery

Original brand paintings:
- squirrel;
- phoenix;
- turtle;
- butterfly.

They can support the four universe associations documented in the project brief.

The animal should remain visually prominent.

Avoid generic stock imagery when client/original imagery can tell the story better.

## Doors / universe navigation

Four door illustration files are available under `design/brand/doors/`, but visual audit confirms three closed universe doors and one shared open passage. There is no closed Air/Papillon door. See `../docs/BRAND-ASSET-MAPPING.md` before assigning door media.

Use them as storytelling/navigation support, especially for the Accompagnements hub.

Rules:
- real headings/descriptions/anchors remain visible;
- door art never becomes the only navigation affordance;
- subtle hover motion is allowed;
- no forced/timed reveal;
- honor `prefers-reduced-motion`;
- maintain keyboard and touch accessibility.

## Layout / composition

Prefer:
- breathable sections;
- strong editorial hierarchy;
- a small number of meaningful visual moments;
- asymmetry where it supports the handmade identity;
- original illustrations/paintings over generic card grids;
- clear conversion paths.

Avoid:
- excessive cardification;
- repetitive SaaS-style sections;
- generic bento grids;
- decorative glassmorphism;
- arbitrary gradients/glows;
- huge empty hero blocks with little meaning;
- excessive pill labels;
- template-like AI composition.

## Motion

Motion intensity should remain restrained.

Use motion to:
- acknowledge hover/focus;
- suggest a door opening/universe transition;
- support hierarchy.

Never use motion to block access to content.

## Responsive behavior

Minimum review widths:
- 375px
- 768px
- 1024px
- 1440px

Typography, artwork and door components must remain legible and non-overlapping across these widths.

## Accessibility

Minimum:
- semantic controls;
- visible keyboard focus;
- appropriate contrast;
- touch targets;
- non-color-only states;
- labels/error messaging;
- responsive typography;
- reduced motion;
- meaningful alt-text strategy.

Decorative artwork should not create redundant screen-reader noise.

## Performance

Priorities:
- LCP;
- CLS;
- optimized/responsive images;
- minimal font cost;
- restrained JS/animation;
- no duplicate CSS;
- cache-aware verification.

## WordPress implementation

Theme: Astra

Child theme:
- `wp-content/themes/lemoulindelaure-child/`

Frontend-affecting plugins:
- Rank Math
- Complianz
- Forminator
- Timetics
- Structured FAQ
- LiteSpeed Cache

Rules:
- never modify WordPress core;
- never modify Astra parent files;
- keep overrides upgrade-safe;
- preserve SEO/schema/privacy/form/booking behavior;
- use the child theme for project presentation code;
- keep Structured FAQ custom code in its project plugin;
- do not adopt React/shadcn/Tailwind just because a reference uses it.

## Content tone alignment

Visual design must support:
- French vouvoiement;
- accessible explanations;
- informative tone;
- gentle warmth;
- light humour when appropriate;
- sensitive handling of grief/deceased-related content;
- grounded presentation of spiritual/intuitive topics.

## Medical / veterinary guardrail

Design must never visually imply clinical authority, diagnosis or guaranteed treatment.

Relevant pages must make boundaries easy to find without turning the entire experience into warning-heavy UI.

## Design tooling

See `design-system/TOOLING.md`.

UI/UX Pro Max, Taste Skill and 21st are advisory tools, not brand authorities.

## Maintenance

Durable approved changes go into `design-system/DECISIONS.md`.

Page-only deviations belong under `design-system/pages/`.

If an explicit later client decision changes an approved foundation, update:
1. `DECISIONS.md`;
2. this file;
3. child-theme tokens/assets;
4. relevant page documentation.
