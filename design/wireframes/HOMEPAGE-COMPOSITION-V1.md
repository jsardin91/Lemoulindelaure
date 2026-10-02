# Homepage Composition Spec V1 — Le Moulin de Laure

Status: **working composition spec — design handoff, not yet production implementation**

Last updated: 2026-10-02

Companion files:
- `HOMEPAGE-V1.md`
- `../references/21ST-HOMEPAGE-REFERENCES.md`
- `../../design-system/MASTER.md`

## Goal

Translate the approved homepage wireframe into a composition an implementation agent can reproduce without inventing a new design.

The page should feel like an editorial journey into four living universes, not a generic service landing page.

## Global frame

Desktop content grid:
- 12 columns
- max content width: ~1240–1320px
- outer gutter: clamp(24px, 4vw, 64px)
- section vertical rhythm: 88–128px desktop, 64–88px tablet, 48–72px mobile
- body measure: 60–72 characters where prose is long
- approved type only: Lora + Source Sans 3
- approved palette only

Shape system:
- main content surfaces: soft radius 14–16px only when a true surface exists
- buttons may use a more rounded/pill treatment if the child-theme system already does so
- do not put every content group inside a rounded card

Image treatment:
- no black drop shadows
- use paper/cream separation, subtle border, crop and overlap
- preserve intrinsic dimensions/aspect-ratio to prevent CLS

Motion:
- 1–2 meaningful motions per viewport maximum
- transform/opacity only
- reduced-motion must render a complete static state

---

# 0. Header

Desktop:
- height: 68–72px
- background initially transparent/cream-integrated
- after scroll: paper/cream background + subtle bottom line
- logo zone ~190–220px max width
- nav centered/right with generous but controlled gaps
- primary CTA at far right

Do not:
- place the full tall logo in a way that makes the header oversized
- use two rows at 1024px
- shrink nav text excessively to make it fit

Tablet:
- switch earlier to compact menu when needed

Mobile:
- 56–64px
- horizontal logo or emblem + wordmark
- 44px minimum menu control

---

# 1. Hero — editorial split

## Desktop composition

Grid:
- copy: columns 1–5
- visual: columns 6–12
- min-height: calc(100dvh - header), but content must not feel artificially stretched
- copy vertically centered slightly above true center
- visual can bleed ~24–40px toward the right edge

Copy stack:
- H1: Lora 600, fluid ~48–64px, max 2 lines
- support: Source Sans 3, ~18–20px, max 20 words
- CTA row: 1 primary + 1 secondary maximum

No eyebrow unless final copy genuinely needs one.

## Hero art collage

Use:
- four original paintings
- no doors

Recommended hierarchy:
- dominant painting: 44–52% of visual field
- second painting: 26–32%
- two supporting crops: 18–24% each
- overlap: 4–8% only
- preserve visual breathing room between animal faces/details

Suggested pattern:
- one large vertical crop slightly right
- one medium crop upper-left within visual half
- two smaller crops lower/outer edge
- subtle cream/paper backing only if needed

Do not:
- put each image in an identical card
- frame all four equally
- add fake tape/polaroid decorations by default
- animate all four continuously

Reference family:
- 21st Editorial Collage Hero
- 21st Split Hero With Image Cards
- Ravi Katiyar split hero for overall asymmetry

## Mobile

Source order:
1. H1
2. support
3. CTAs
4. artwork

This is mandatory: text/message before decoration.

Art:
- one lead painting ~70vw
- 2–3 supporting crops partially visible but contained
- no horizontal overflow

---

# 2. Manifesto — “Pourquoi Le Moulin”

Layout:
- full-width editorial pause
- max-width prose block ~820px
- centered or slightly offset
- cream/paper background continuity

Typography:
- one Lora statement ~36–48px desktop
- 1–2 paragraphs below, max 65ch

Asset:
- one small crop/detail from the logo or a painting can punctuate the section
- optional fine illustrated path/line leading toward the universes

No CTA required here.

Purpose:
emotion + context, not conversion.

---

# 3. Four universes — signature portal scene

This is the most distinctive homepage section.

## Desktop

Section top:
- title + short explanation stacked, max-width ~760px
- no split-header filler paragraph

Portal field:
- four vertical zones
- recommended proportions: 23 / 27 / 23 / 27%, or other controlled asymmetry
- minimum height ~520–620px depending on final door art crop

Each universe contains:
- door art
- explicit animal + element line
- accompaniment title
- one-sentence intention
- text link / arrow

Important:
the accompaniment name is visible before hover.

## Interaction

Pointer/focus:
- door translates/rotates subtly to imply opening
- associated painting/color layer is revealed slightly
- title/link state gains contrast/underline/arrow movement

Motion budget:
- ~180–260ms for hover/focus
- no physics-heavy swing
- no multi-second reveal

Keyboard:
- each portal is one logical link target
- focus ring visible around whole portal/link region

Reduced motion:
- static partially-open/revealed presentation
- no change needed to understand destination

## Tablet

2x2 portals.

## Mobile

Default:
- 1 column for maximum legibility
- 2 columns only if real-device testing confirms labels remain readable

Do not use swipe-only navigation.

## Asset mapping

Animal/service mapping is fixed by client brief:
- squirrel -> Communication animalière
- phoenix -> Accompagnement énergétique animalier
- turtle -> Connexion avec les défunts
- butterfly -> Guidance pour soi

Generated door filenames must be visually matched to the intended universe during implementation; do not infer the filename-to-service mapping without opening the actual assets.

---

# 4. Laure — human credibility

## Desktop

Grid:
- portrait/visual: 5 columns
- content: 5–6 columns
- 1–2 columns intentional negative space

Portrait:
- real photo only
- target crop 4:5 or 3:4
- no generated substitute for Laure

Text:
- short introduction
- one training/experience fact highlighted typographically
- values woven into prose, not icon cards
- CTA: “À propos” / “Découvrir Laure” wording to be finalized globally

Visual treatment:
- portrait can overlap a paper-colored field or thin frame
- no testimonial-style badge cloud

Mobile:
- portrait first
- text second
- highlighted fact remains readable without overlay

---

# 5. Practical process

Layout family:
ordered process, not cards.

Desktop:
- 3 steps on one horizontal baseline
- large numerals or simple custom icons
- each step max ~20–30 words
- connective line uses `Line` / Moulin blue at restrained opacity

Mobile:
- vertical timeline
- number -> heading -> text
- connectors purely decorative and hidden from screen readers

Primary CTA after the process:
**Prendre rendez-vous**

---

# 6. Values + boundaries field

Use a full-width color field to change rhythm.

Recommended background:
- Ink or Moulin blue
- accessible Paper/Cream text

Composition:
- heading left/top
- values arranged as editorial typographic clusters, not chips
- 3 or 4 values emphasized visually
- remaining values integrated in one concise line/prose

Medical/veterinary boundary:
- dedicated smaller paragraph separated by a line
- clear but not warning-box red
- no clinical iconography

Mobile:
- one-column typographic rhythm
- no tiny multi-column words

---

# 7. Le Jardin teaser

Visual tone:
- lighter, greener, calmer
- use Teal / Leaf green as accents, not a separate brand

Desktop:
- wide editorial band
- copy ~6 columns
- visual/motif ~5 columns

Asset:
- botanical/organic detail can be derived from approved brand assets
- do not invent practitioner portraits or logos

CTA:
**Découvrir le Jardin**

Do not visually align it as a fifth accompaniment.

---

# 8. Journal teaser

Only render in production when real articles exist.

Desktop:
- editorial magazine layout
- featured article ~7 columns
- two supporting stories ~5 columns stacked

Featured visual:
- 16:10 or 4:3
- title, date/category metadata below/adjacent

Supporting:
- thumbnail + title + metadata
- no three identical cards

Mobile:
- featured story
- supporting stories stacked

Reference family:
- 21st Content Grid Section
- editorial/magazine layout principles from UI/UX Pro Max

---

# Optional reviews

Only use when verified reviews exist.

Preferred composition:
- editorial quote or split testimonial
- 1 strong quote visible at a time, with manual controls if multiple

Avoid:
- autoplay
- marquee wall
- star ratings unless source data genuinely supports them
- fabricated avatars

Reference:
- 21st Editorial Testimonial / Split Testimonial

---

# 9. FAQ + booking close

## Desktop

Grid:
- FAQ: 7 columns
- booking close: 5 columns

FAQ:
- semantic accordion
- 4–6 launch questions
- large comfortable rows
- no excessive borders

Booking panel:
- one short message
- one original artwork/emblem
- one CTA: **Prendre rendez-vous**

No embedded Timetics calendar on homepage in V1.

## Mobile

FAQ first, booking panel second.

Reference family:
- 21st Two-Column FAQ / clean FAQ accordion patterns

---

# 10. Footer

Background:
- deep Ink/Moulin blue or Cream, depending final page closing contrast

Structure:
- logo/signature
- Découvrir
- Contact / RDV
- Legal

Do not add another giant CTA hero inside the footer.

Copyright/artwork wording remains subject to final legal text.

---

# 21st adaptation rule

For every 21st reference:
1. inspect preview
2. identify the useful compositional idea
3. remove React/Tailwind/Framer-specific assumptions
4. check against active brand
5. reproduce semantically in the Astra child theme
6. simplify motion
7. test keyboard + reduced motion
8. never install a component merely because it looks polished

---

# Owner review checklist

Before marking this composition approved:
- Does the hero feel like Le Moulin rather than a generic wellness site?
- Are the four paintings visible enough without overwhelming the message?
- Are the four doors the strongest memorable moment?
- Is “Prendre rendez-vous” easy to find without making the site salesy?
- Does Le Jardin clearly read as separate from the four accompaniments?
- Does the page remain grounded, not overly spiritual?
- Does the page still feel colorful/joyful?
- Is the mobile reading order natural?
