---
status: draft
brand: "Le Moulin de Laure"
last_reviewed: 2026-09-27
---

# Le Moulin de Laure — Master Design System

> `status: draft` means the supplied logo and painted artwork informed a working palette. Formal brand guidelines, final service names and client validation are still pending. Do not mark active yet.

## Brand foundations

Business card: Laure Moulin, communicatrice animalière. Confirm all offers, audiences and page copy with the client.

## Visual thesis

Handmade painted imagery, a cream paper ground, a clear blue text color and gentle gold detail. The portal/door motif leads to real service pages; artwork is decorative around readable HTML content.

## Color system

Draft palette sampled and tuned for legible web use from the supplied JPEG logo (not official color specifications):

| Role | Hex | Usage |
| --- | --- | --- |
| Cream | `#FAF7EF` | Main background |
| Paper | `#FFFDF8` | Raised surface |
| Ink | `#173F54` | Headings and body |
| Moulin blue | `#165A77` | Links and primary actions |
| Teal | `#306C67` | Secondary actions and accents |
| Leaf green | `#426F47` | Accent on light ground |
| Antique gold | `#B68631` | Illustration, border and large ornament, not small text on cream |
| Lavender | `#666294` | Accent |
| Line | `#DCD4BD` | Neutral separation |

Reference colors: `wp-content/themes/lemoulindelaure-child/style.css` and `theme.json`.

## Typography

Proposition issue du benchmark UI/UX Pro Max : Lora 600 pour les titres et Source Sans 3 400 pour le corps, 600 pour les contrôles. Fichiers WOFF2 hébergés dans le thème enfant ; détails et alternatives dans `TYPOGRAPHY-BENCHMARK.md`. Le lettrage du logo reste la photographie fournie. Validation du client encore attendue.

## Spacing, layout, components, imagery and icons

Four paintings and four door illustrations are prepared; artwork does not determine service labels. Use real headings, descriptions and anchors in HTML. The door component can accompany a link, not replace it.

## Motion

Subtle hover movement is permitted for decorative doors; honor `prefers-reduced-motion`. No compulsory timed reveal, scroll gate or inaccessible door mechanism.

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
