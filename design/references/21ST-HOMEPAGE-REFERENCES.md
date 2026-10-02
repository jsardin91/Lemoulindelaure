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

## Selected references

### 1. Ravi Katiyar — Hero Section

URL:
https://21st.dev/%40ravikatiyar162/components/hero-section-2

What is useful:
- asymmetrical split-screen composition;
- strong copy area plus expressive visual asset;
- image treated as part of the composition rather than a generic card;
- clear CTA hierarchy.

Adaptation for Le Moulin:
- replace adventure imagery with the original four client paintings;
- remove dependency on Framer Motion;
- use the approved cream/paper/deep-blue palette;
- keep motion subtle;
- no duplicate logo/contact information inside the hero.

Decision:
**Use composition principle, not component code.**

### 2. Systaliko UI — CTA section with gallery

URL:
https://21st.dev/%40youcefbnm/components/cta-section-with-gallery

What is useful:
- editorial image grouping;
- staggered visual rhythm;
- good pattern for showing multiple source images without equal-sized generic cards.

Adaptation for Le Moulin:
- useful inspiration for the homepage visual collage and possibly final CTA;
- use Laure's own paintings/photos rather than stock imagery;
- remove heavy entrance/stagger animation;
- keep image ratios stable to avoid CLS.

Decision:
**Use gallery rhythm selectively.**

### 3. Tommy Jepsen — Testimonials

URL:
https://21st.dev/%40tommyjepsen/components/testimonials

What is useful:
- dedicated social-proof section;
- visual separation from the sales narrative;
- carousel structure can handle several reviews.

Adaptation for Le Moulin:
- only activate when real client reviews are available;
- never invent testimonials;
- if carousel is used, provide visible previous/next controls;
- no automatic rotation by default;
- on mobile, a simple stacked/manual pattern may be preferable.

Decision:
**Conditional reference.**

### 4. PrebuiltUI — FAQ section

URL:
https://21st.dev/%40prebuiltui/components/faq-sections/clean-faq-section-with-filled-bg

What is useful:
- simple accordion rhythm;
- strong scanning;
- clear question/answer hierarchy.

Adaptation for Le Moulin:
- use project FAQ questions;
- preserve semantic button/region behavior;
- use custom Structured FAQ/schema architecture without duplicate schema;
- use approved colors instead of slate defaults.

Decision:
**Use interaction pattern, simplify visuals.**

### 5. 21st Hero library / Editorial Collage direction

URL:
https://21st.dev/community/components/s/hero-section

Useful catalogue directions:
- Editorial Collage Hero;
- Split Hero With Image Cards;
- Hero with group of images, text and two buttons.

Adaptation:
- favor editorial collage and split composition;
- reject generic image-card grids;
- reject heavy WebGL/shader/3D hero treatments.

## Explicitly rejected directions

For this brand, do **not** use as primary homepage language:
- black-hole / shader heroes;
- liquid-glass effects;
- tech spotlight cards;
- cyberpunk/neon;
- large WebGL scenes;
- heavy scroll morphing;
- full-screen scroll-jacking;
- generic SaaS bento grids;
- purple AI gradients.

Reason:
they conflict with the approved grounded, gentle, animal-forward and handmade identity.

## 21st implementation handoff

When Codex/Claude Code with 21st MCP is used later, search for:
- editorial collage hero;
- split hero with image composition;
- organic editorial gallery;
- accessible testimonials;
- clean FAQ accordion;
- image-led CTA.

The agent should return previews first, then compare them against:
- `design-system/MASTER.md`
- `design/brand/BRAND-GUIDELINES-WORKING.md`
- `design/wireframes/HOMEPAGE-V1.md`

Do not install a component solely because it looks polished.
