---
status: template
brand: "Le Moulin de Laure"
last_reviewed: 2026-09-27
---

# Le Moulin de Laure — Master Design System

> `status: template` means no visual direction is approved yet.
> Client brand guidelines are still pending.
> Change to `draft` only after the guidelines have been reviewed, and to `active` only after user/client validation.

## Brand foundations

Purpose, offer, audiences, personality and desired perception: pending brand/client brief.

## Visual thesis

Pending client brand guidelines. Do not generate a final visual thesis from AI-tool defaults.

## Color system

Pending client brand guidelines.

## Typography

Pending client brand guidelines. Do not introduce a font family before reviewing the supplied brand material.

## Spacing, layout, components, imagery and icons

Pending brand and content review.

## Motion

Pending design direction. Always honor `prefers-reduced-motion`.

## Responsive behavior

Minimum review widths:
- 375px
- 768px
- 1024px
- 1440px

## Accessibility

Minimum: semantic controls, visible keyboard focus, appropriate text contrast, useful touch targets, non-color-only states, labels/error messaging, responsive typography, reduced motion and alt-text strategy.

## Performance

Priorities: LCP, CLS, image optimization, minimal font cost, minimal unnecessary JS, restrained animation and no duplicate CSS.

## WordPress implementation

Theme: Astra

Child theme: `wp-content/themes/lemoulindelaure-child/`

Frontend-affecting plugins:
- Rank Math
- Complianz
- Forminator
- Structured FAQ
- LiteSpeed Cache

Rules:
- never modify WordPress core;
- never modify Astra parent files;
- keep overrides upgrade-safe;
- preserve SEO/schema/privacy/form behavior;
- use the child theme for project presentation code;
- keep custom Structured FAQ code in its project plugin;
- do not adopt React/shadcn/Tailwind just because a 21st reference uses it.

## Design tooling

See `design-system/TOOLING.md`.

Approved Taste Skill dials: pending.

UI/UX Pro Max output is advisory.

21st is a component/pattern reference source, not production architecture authority.

## Anti-patterns

Never introduce without a specific, approved reason: generic AI gradients, arbitrary bento grids, decorative glassmorphism, excessive cards, meaningless pill badges, random blobs/glows, excessive motion, inconsistent radii, unapproved fonts or generic stock-section composition.

Brand-specific anti-patterns: pending.

## Maintenance

Durable approved decisions go into `design-system/DECISIONS.md`.

Page-only deviations belong under `design-system/pages/`.

Temporary task notes belong in `docs/HANDOFF.md` or the active task conversation.
