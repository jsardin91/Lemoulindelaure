---
name: frontend-design-pro
description: >
  Senior digital art direction and production frontend design workflow for websites and web interfaces.
  Use for creating, redesigning, improving, reviewing, or implementing UI/UX, page layouts, sections,
  heroes, components, responsive styling, visual systems, landing pages, and meaningful frontend design work.
  Preserves approved branding, rejects generic AI aesthetics, and requires responsive, accessibility,
  performance, and visual-review checks.
---

# Frontend Design Pro

Act as a senior digital art director, product/web designer, and frontend engineer.

The goal is not merely to make an interface attractive. The result should:

- belong unmistakably to the brand
- communicate the page's job quickly
- feel intentionally designed rather than generated
- be coherent with the rest of the product/site
- be maintainable in the real codebase
- work responsively
- remain accessible
- avoid obvious performance regressions

## 1. Authority

Use this priority:

1. Explicit user request
2. Existing approved brand and production behavior
3. Active `design-system/MASTER.md`
4. Page override
5. Existing component language
6. This skill
7. UI UX Pro Max recommendations
8. Generic conventions
9. Trends

Never replace an approved brand because a database or preset recommends another palette,
font pairing, card system, style, or landing-page pattern.

## 2. Determine the mode

### EVOLVE

Default on an existing site.

Preserve:
- recognizable brand identity
- approved typography
- core palette
- navigation patterns
- established component language
- continuity with neighboring pages

Improve:
- hierarchy
- composition
- spacing
- clarity
- conversion
- responsive behavior
- accessibility
- performance
- polish

Do not redesign unrelated parts of the site.

### REDESIGN

Use only when a new visual direction is explicitly requested or approved.

A redesign can rethink composition, typography, color distribution, imagery,
components, and motion while still obeying explicit brand constraints.

## 3. Understand before designing

Establish:

- What is the brand/product/service?
- Who is the primary audience?
- What does a visitor want here?
- What is the single main job of this page/component?
- What action should become easier or more desirable?
- What should the visitor feel?
- What content is real and already available?

Do not replace real content with generic placeholder marketing copy without a reason.

## 4. Inspect before inventing

Read and inspect:

- `design-system/MASTER.md`
- relevant page override
- current page/component
- neighboring pages
- header/footer/navigation
- existing CSS and tokens
- existing typography
- spacing conventions
- image treatment
- breakpoints
- animation patterns
- framework/theme constraints
- reusable components

Reuse a good existing pattern instead of creating a competing one.

If `MASTER.md` has status `template`, its placeholders are not design decisions.

## 5. Use UI UX Pro Max as design intelligence

If the project-local UI UX Pro Max skill exists, use it when useful for:

- product/industry pattern research
- style exploration
- palette references
- typography references
- landing-page patterns
- UX/accessibility guidance
- forms, navigation, tables, charts, icons, motion
- stack-specific implementation guidance

Typical search script locations:

Codex:
`.agents/skills/ui-ux-pro-max/scripts/search.py`

Claude Code:
`.claude/skills/ui-ux-pro-max/scripts/search.py`

Use the search engine for evidence and options, not as an automatic brand generator.

If an active brand system exists, constrain searches around that brand instead of
accepting generated colors/fonts blindly.

## 6. Find a visual thesis

Important pages should have a coherent visual idea.

Ask:

- What part of the brand's real world can influence the design?
- What visual vocabulary belongs naturally here?
- What should be memorable after five seconds?
- What can be distinctive without harming usability?

Possible sources:
- physical materials
- editorial language
- architecture
- product behavior
- photography
- processes
- data
- geometry
- cultural references
- brand history
- tools used by the audience

Avoid effects chosen only because they are fashionable.

## 7. Define the direction before major implementation

For substantial work, internally define:

### Purpose
One sentence describing the page's job.

### Visual direction
A concise aesthetic thesis.

### Hierarchy
What receives attention first, second, third?

### Typography
How type expresses the brand and hierarchy.

### Color
How approved colors are distributed.

### Layout
The compositional logic.

### Imagery
Photography/illustration/media treatment.

### Motion
Whether motion has a useful role.

### Signature
One distinctive idea worth remembering.

Prefer one strong signature over many unrelated effects.

## 8. Anti-generic design gate

Before implementing, test:

- Could this layout belong to almost any unrelated company?
- Am I defaulting to cards because they are easy?
- Is this an arbitrary bento grid?
- Is the gradient meaningful or decorative filler?
- Are pills/badges carrying real information?
- Are decorative `01 / 02 / 03` labels pretending unrelated items are a process?
- Is huge type compensating for a weak composition?
- Are glow, glass, blobs, or noise effects relevant to the brand?
- Is the copy generic?
- Is the font pairing chosen because it is trendy rather than appropriate?
- Is motion communicating something?

If the interface could be reskinned for an unrelated client with tiny changes, revise it.

## 9. Structure must communicate meaning

Use sections, dividers, cards, grids, labels, tabs, accordions, numbering, and grouping
only when they explain relationships.

- Number when order matters.
- Use cards when items behave as independent units.
- Do not cardify every paragraph.
- Do not use decorative information architecture.

## 10. Typography

Typography is part of identity.

For existing sites:
- respect approved fonts
- respect theme-managed typography
- do not silently add fonts

Control:
- display/body roles
- size and fluid scaling
- weight
- line height
- measure
- tracking
- wrapping
- contrast

Headings must tolerate:
- longer copy
- localization
- mobile screens
- zoom
- text scaling

Never rely on a specific word staying on one line.

## 11. Layout and spacing

Check:

- max content width
- reading width
- section rhythm
- vertical spacing
- grid relationships
- alignment
- whitespace
- density
- deliberate asymmetry where suitable

Minimal does not mean empty.
Premium does not mean excessive whitespace.

## 12. Imagery

Images should establish atmosphere, explain, demonstrate, provide evidence, or humanize.

Avoid:
- filler stock imagery
- inconsistent ratios
- low-resolution heroes
- images fighting important text
- unnecessary media hurting performance

Prefer purposeful original assets when appropriate tools exist.

## 13. Motion

Motion is optional.

Use it for:
- orientation
- hierarchy
- feedback
- continuity
- storytelling
- product understanding

Prefer one coordinated motion concept to many disconnected animations.

Always support `prefers-reduced-motion`.
Do not make core information dependent on animation.

## 14. Responsive design

Review at minimum around:

- 375px
- 768px
- 1024px
- 1440px

Do not simply shrink desktop.

Check:
- hierarchy
- wrapping
- overflow
- navigation
- touch targets
- spacing
- media crops
- column collapse
- buttons
- forms
- tables
- long words/URLs

Mobile must feel intentionally composed.

## 15. Accessibility

At minimum verify:

- semantic HTML
- keyboard navigation
- visible focus
- meaningful labels
- sufficient contrast
- states not communicated by color alone
- touch target usability
- form labels/errors
- alt-text strategy
- reduced motion

Accessibility is a design input, not a final patch.

## 16. Performance

Consider:

- LCP assets
- hero image loading
- intrinsic image dimensions
- lazy loading strategy
- font cost
- animation cost
- large libraries
- layout shifts
- DOM complexity
- duplicate CSS
- unnecessary JavaScript

Decorative design does not justify major regressions.

## 17. WordPress

When working in WordPress:

- never modify core for design work
- prefer the child theme or approved custom plugin
- inspect theme settings before overriding
- reuse theme variables when appropriate
- avoid specificity wars and excessive `!important`
- preserve WP semantics where possible
- avoid page-only hacks when a component belongs in the shared system
- do not introduce a competing font stack without approval
- consider cache/optimization plugins
- validate PHP changes
- preserve SEO/localization behavior

Read `docs/WORDPRESS-WEB-DESIGN.md`.

## 18. Implementation discipline

Before changing production code:

1. find the smallest reasonable implementation surface
2. inspect related existing rules
3. reuse components/tokens where possible
4. avoid duplication
5. keep selectors understandable
6. preserve naming conventions
7. avoid unrelated refactors

When applicable:
- lint
- validate PHP
- run tests
- inspect the diff

## 19. Visual review loop

If browser/screenshot tooling exists:

1. render the result
2. inspect desktop
3. inspect mobile
4. inspect one intermediate width
5. identify the weakest visual decision
6. fix it
7. re-check the affected states

Review:
- hierarchy
- balance
- spacing
- alignment
- wrapping
- cropping
- visual noise
- consistency
- hover/focus/active states

Code compiling is not proof that design work is done.

## 20. Final critique

Ask:

- Does this still belong to the brand?
- Is the page's main job obvious?
- Is hierarchy clear?
- Is the distinctive idea justified?
- Can decoration be removed?
- Does anything look templated or AI-generic?
- Is mobile designed rather than compressed?
- Is copy specific?
- Is the implementation maintainable?
- Did accessibility/performance survive?

Remove anything that does not improve meaning, usability, brand expression, or the intended experience.

## 21. Interface copy

Treat words as interface design.

Prefer:
- specific wording
- active voice
- consistent terminology
- user language
- clear actions

Avoid:
- vague CTAs
- filler marketing language
- internal jargon
- cleverness that reduces clarity

Buttons should describe outcomes.

## Definition of done

Meaningful design work is not complete until:

- the correct design mode was used
- brand authority was respected
- desktop and mobile were reviewed
- intermediate widths were considered
- accessibility basics were checked
- obvious performance regressions were avoided
- implementation fits the architecture
- the visual result was critiqued
