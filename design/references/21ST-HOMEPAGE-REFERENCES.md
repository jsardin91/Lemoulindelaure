# 21st Homepage Reference Study — Le Moulin de Laure

Status: **research reference — not implementation code**

Last reviewed: 2026-10-02

Purpose: keep a durable record of the 21st patterns considered for the homepage so another agent can reproduce the design reasoning without reopening the original conversation.

## Usage rule

21st is a **visual/composition reference layer** for this project.

Do not copy its React/Tailwind/Framer Motion implementation into production by default.

Production remains:
- WordPress
- Astra
- `lemoulindelaure-child`
- semantic HTML/PHP
- project CSS
- lightweight JS only when useful

The active brand system always wins over the reference component.

## Verified 21st catalogue observations

The current 21st image/hero catalogues expose relevant patterns including:
- Editorial Collage Hero
- Split Hero With Image Cards
- Content Grid Section
- image stacks/galleries
- clean CTA sections
- editorial/split testimonials
- Two-Column FAQ / FAQ collections

21st's split-screen guidance also emphasizes that, when a split hero collapses to one column, the message should be first in source order and the image second. This is adopted for the Moulin mobile hero.

## Selected references

### 1. Ravi Katiyar — Hero Section

URL:
https://21st.dev/%40ravikatiyar162/components/hero-section-2

Useful:
- asymmetrical split-screen composition
- strong copy area plus expressive visual asset
- clear CTA hierarchy

Adaptation:
- use original paintings
- remove Framer Motion dependency
- no redundant contact information in hero
- approved cream/deep-blue palette only

Decision:
**composition principle only**

### 2. Editorial Collage Hero

Catalogue:
https://21st.dev/community/components/s/hero-section
https://21st.dev/community/components/s/image

Useful:
- editorial image grouping
- varying image scale
- art-led composition without forcing equal cards

Adaptation:
- four original client paintings
- restrained overlap
- no fake photography treatment
- no heavy entrance choreography

Decision:
**primary hero visual reference family**

### 3. Split Hero With Image Cards

Catalogue:
https://21st.dev/community/components/s/hero-section

Useful:
- reliable copy/visual separation
- graceful mobile collapse concept

Important guidance:
message-first source order on mobile.

Decision:
**layout logic, but replace card language with freer editorial collage**

### 4. Content Grid Section

Catalogue:
https://21st.dev/community/components/s/image

Useful:
- image-led content hierarchy
- possible reference for Journal teaser

Adaptation:
- one featured article + two supporting articles
- avoid equal card grid

Decision:
**Journal reference family**

### 5. Editorial Testimonial

URL:
https://21st.dev/%40jatin-yadav05/components/editorial-testimonial

Useful:
- quote treated as editorial typography rather than a generic review card

Adaptation:
- activate only with real verified reviews
- no fabricated avatar/photo

Decision:
**preferred review direction if reviews exist**

### 6. Split Testimonial

URL:
https://21st.dev/%40jatin-yadav05/components/split-testimonial

Useful:
- portrait + quote pairing
- controlled single-story focus

Adaptation:
- manual controls
- no autoplay by default
- reduced-motion safe

Decision:
**secondary review option**

### 7. FAQ patterns

Catalogue examples:
https://21st.dev/community/components/explore/contact-us-page-examples
https://21st.dev/community/components/s/landing-page

Useful:
- two-column FAQ
- clean accordion hierarchy

Adaptation:
- project FAQ
- semantic button/region behavior
- custom Structured FAQ/schema ownership
- approved colors only

Decision:
**interaction reference**

## Explicitly rejected directions

Do not use as primary homepage language:
- black-hole / shader heroes
- liquid-glass effects
- tech spotlight cards
- cyberpunk/neon
- large WebGL scenes
- heavy scroll morphing
- full-screen scroll-jacking
- generic SaaS bento grids
- purple AI gradients
- testimonial marquees just because they are popular

Reason:
they conflict with the approved grounded, gentle, animal-forward, readable and handmade identity.

## Search prompts for future 21st MCP use

When Codex/Claude has the real MCP connected, use narrow searches such as:
- editorial collage hero organic
- split hero artwork editorial
- image-led magazine content grid
- editorial testimonial
- accessible two-column faq
- gallery CTA editorial
- organic about founder portrait

Ask for 2–3 preview candidates before installing anything.

## Implementation handoff

Compare any candidate against:
- `design-system/MASTER.md`
- `design/brand/BRAND-GUIDELINES-WORKING.md`
- `design/wireframes/HOMEPAGE-V1.md`
- `design/wireframes/HOMEPAGE-COMPOSITION-V1.md`

Do not install a component solely because it looks polished.
# V1 implementation review — 2026-10-02

The installed 21st MCP was queried for `editorial collage hero`, `founder editorial section`, `editorial magazine content grid` and `accessible faq`. The public [Editorial Collage Hero preview](https://21st.dev/@felipemenezes098/components/hero-04) was opened in the browser. Its useful idea is the readable left editorial copy next to visual artwork and two clear actions. The V1 hero uses a more asymmetric four-painting composition, the approved palette/type, and native Gutenberg blocks. Its React/shadcn code, pale wash, imagery and motion were not copied.

The magazine and FAQ results were reviewed as metadata only. They were not adopted because no validated articles or FAQ answers exist yet. The V1 provides restrained Journal/FAQ entry points for later editorial completion.
