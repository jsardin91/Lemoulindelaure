---
status: template
brand: "[BRAND NAME]"
last_reviewed: null
---

# [BRAND NAME] — Master Design System

> `status: template` means nothing in brackets is approved.
> Change status to `draft` while developing the system and `active` only after the brand rules are validated.

## 1. Brand foundations

### Purpose
[Why the brand exists]

### Core offer
[What the brand actually sells/provides]

### Primary audiences
- [Audience]
- [Audience]

### User needs
- [Need]
- [Need]

### Brand personality
- [Trait]
- [Trait]
- [Trait]

### We are
- [Characteristic]
- [Characteristic]

### We are not
- [Anti-characteristic]
- [Anti-characteristic]

### Desired perception
Visitors should feel:
- [Feeling]
- [Feeling]
- [Feeling]

## 2. Design mode

Default: `EVOLVE`

Use `REDESIGN` only when explicitly approved.

## 3. Visual thesis

### Core idea
[One paragraph defining the visual language]

### Signature
[One memorable design principle/motif]

### Design principles
1. [Principle]
2. [Principle]
3. [Principle]

## 4. Color system

### Primary
- `--color-primary`: [value]
- `--color-primary-dark`: [value]
- `--color-primary-light`: [value]

### Secondary
- `--color-secondary`: [value]

### Accent
- `--color-accent`: [value]

### Neutrals
- `--color-bg`: [value]
- `--color-surface`: [value]
- `--color-text`: [value]
- `--color-text-muted`: [value]
- `--color-border`: [value]

### Semantic
- success: [value]
- warning: [value]
- error: [value]
- info: [value]

### Distribution rules
- [Rule]
- [Rule]

### Do not
- [Rule]
- [Rule]

## 5. Typography

### Source of truth
[Theme / local files / font service / system stack]

### Display
[Font + fallback + roles]

### Body
[Font + fallback + roles]

### Utility/UI
[Font + fallback + roles]

### Type principles
- [Rule]
- [Rule]

Do not introduce another font without explicit approval.

### Scale
- H1: [fluid rule / weight / line-height]
- H2: [...]
- H3: [...]
- H4: [...]
- Body large: [...]
- Body: [...]
- Small: [...]

## 6. Spacing and layout

### Base spacing system
[4px / 8px / custom]

### Content max width
[Value]

### Reading width
[Value]

### Section spacing
[Desktop/tablet/mobile rule]

### Grid
[Columns/gaps]

### Composition
[Editorial / centered / asymmetric / modular / etc.]

### Density
[Low / medium / high + explanation]

## 7. Shape, border, depth

### Border radius
- small: [...]
- medium: [...]
- large: [...]

### Borders
[Rules]

### Shadows
[Rules]

### Depth philosophy
[Flat / layered / restrained / etc.]

## 8. Components

### Buttons
Primary:
[...]

Secondary:
[...]

Tertiary/text:
[...]

Hover:
[...]

Focus:
[...]

Disabled:
[...]

### Cards
[When to use + visual rules]

### Forms
[Field, label, help, error, focus]

### Navigation
[Desktop/mobile behavior]

### Breadcrumbs
[Rules]

### Tags / badges
[When they are meaningful]

### Accordions / FAQ
[Rules]

### CTAs
[Hierarchy and repetition]

## 9. Imagery

### Photography
[Subject, lighting, composition, grading]

### Illustration
[Rules]

### Image treatment
[Crop, ratio, radius, overlays]

### Hero media
[Rules]

### Avoid
- [Rule]
- [Rule]

## 10. Icons

Preferred library/style:
[...]

Rules:
- [Rule]
- [Rule]

## 11. Motion

Motion personality:
[...]

Allowed:
- [Pattern]
- [Pattern]

Avoid:
- [Pattern]
- [Pattern]

Always honor `prefers-reduced-motion`.

## 12. Responsive behavior

Verification widths:
- 375px
- 768px
- 1024px
- 1440px

### Mobile
- [Rule]
- [Rule]

### Tablet
- [Rule]
- [Rule]

### Desktop
- [Rule]
- [Rule]

## 13. Accessibility

Minimum:
- semantic controls
- visible keyboard focus
- WCAG-appropriate text contrast
- useful touch targets
- non-color-only states
- labels and error messaging
- responsive typography
- reduced motion
- alt-text strategy

Brand-specific notes:
- [Rule]

## 14. Performance

Priorities:
- LCP
- CLS
- image optimization
- minimal font cost
- minimal unnecessary JS
- restrained animation
- no duplicate CSS

Project-specific:
- [Rule]
- [Rule]

## 15. WordPress implementation

Theme:
[Theme]

Child theme:
[Name/path]

Frontend-affecting plugins:
- [Plugin]
- [Plugin]

Typography source:
[...]

Cache/CDN/performance:
[...]

Rules:
- never modify WordPress core
- keep overrides upgrade-safe
- reuse theme capabilities where sensible
- avoid duplicate typography systems
- preserve SEO/localization behavior

## 16. Content and UX voice

### Voice
[Short description]

### CTA style
[Rules]

### Labels
[Rules]

### Do
- [Rule]

### Avoid
- [Rule]

## 17. Anti-patterns

Never introduce without a specific reason:
- generic AI gradients
- arbitrary bento grids
- decorative glassmorphism
- excessive cards
- meaningless pill badges
- decorative process numbering
- random blobs/glows
- excessive motion
- inconsistent radii
- unapproved fonts
- generic stock sections

Brand-specific anti-patterns:
- [Anti-pattern]
- [Anti-pattern]

## 18. Page relationships

Pages should remain related through:
- typography
- spacing rhythm
- component language
- media treatment
- color distribution
- navigation
- CTA hierarchy

Individual pages may have character without becoming separate brands.

## 19. Approved exceptions

None yet.

## 20. Maintenance

Persistent decisions go into `design-system/DECISIONS.md`.

Page-only deviations belong under `design-system/pages/`.

Do not add temporary task notes to this file.
