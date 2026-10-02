# Accompagnements Hub — Wireframe V1

Status: **working design draft — ready for owner review, not implementation-approved**

Last updated: 2026-10-02

Sources:
- client brief
- `docs/SITE-ARCHITECTURE.md`
- `design-system/MASTER.md`
- local UI/UX Pro Max
- local Taste Skill
- Frontend Design Pro
- 21st references in `design/references/21ST-ACCOMPAGNEMENTS-REFERENCES.md`

## Page job

Help visitors understand the four accompaniment universes and confidently choose which page to explore next.

This page is a **navigation/understanding hub**, not a sales comparison table.

It must not rank, score or imply that one accompaniment is better than another.

## Visual thesis

**Four distinct thresholds connected by one heart/link.**

The page should make the four universes feel related but genuinely different:
- Terre / vivant
- Feu / énergie
- Eau / famille
- Air / messager

The visual system should make the doors feel like entrances, not service cards.

## Core UX principle

A visitor must understand each accompaniment **without relying on hover, animation or symbolic artwork**.

Every panel must expose:
- animal
- element
- accompaniment name
- short plain-language intent
- visible link/CTA

The visual interaction adds delight but never carries essential meaning.

---

# 0. Page intro / hero

## Purpose

Orient the user before the four choices.

Desktop:
- restrained text-forward hero
- no large image collage (homepage already owns that language)
- optional subtle emblem / illustrated line / four-element motif
- max-width heading block ~800px

Content:
- H1: “Les accompagnements” or final SEO-approved wording
- concise explanation of the four paths
- one supporting line connecting them through “le lien”

No primary booking CTA in the first screen unless testing later proves necessary; first job is understanding the offers.

Mobile:
- text only or very light decorative motif
- avoid eating viewport height

---

# 1. Four-universe interactive field

This is the main page signature.

## Desktop layout

Four adjacent vertical panels across the content width.

Default:
- all four visible
- roughly equal width
- label area always readable

Active on hover/focus:
- selected panel expands moderately
- neighboring panels contract but stay identifiable
- associated original painting becomes more visible
- door reveal opens slightly
- short supporting description becomes visible/expands

Recommended ratio:
- default 25/25/25/25
- active ~36–40%
- three others share the remainder
- never collapse inactive panels below a readable minimum

## Panel anatomy

Each panel contains:
1. animal + element
2. accompaniment H2/H3-level title
3. door artwork
4. original animal painting or crop
5. one-sentence intention
6. visible “Découvrir” link

### Universe A
Écureuil — Terre — Vivant  
**Communication animalière**

Intent from client brief:
better understand the animal and the bond that connects human and animal.

### Universe B
Phénix — Feu — Énergie  
**Accompagnement énergétique animalier**

Intent:
an energetic approach to caring for/supporting living beings.

### Universe C
Tortue — Eau — Famille  
**Connexion avec les défunts**

Intent:
explore the continuing link when physical presence is gone.

### Universe D
Papillon — Air — Messager  
**Guidance pour soi**

Intent:
open new ways of understanding a situation or life path through what is felt/perceived.

## Visual separation

Do not assign four random saturated theme colors.

Use the approved brand palette with controlled shifts:
- Terre: Leaf green / Cream
- Feu: Antique gold + Ink, with restrained warm accent
- Eau: Moulin blue / Teal
- Air: Lavender / Paper

These are page-level emphasis distributions, not new palette tokens.

## Motion

Hover/focus:
- width expansion
- door transform
- artwork opacity/crop reveal
- arrow/underline micro-movement

Constraints:
- total duration ~200–320ms
- use transform/opacity where possible
- if width animation causes layout cost, use CSS grid/flex-basis carefully and verify performance
- no 3D perspective theatrics

Reduced motion:
- fixed 4-column state
- full labels and links available
- no expanding behavior required

## Keyboard

Every panel behaves as a real link or contains a clear link.
Focus should trigger the same information emphasis as hover.

Do not trap focus inside a panel.

## Tablet

Preferred:
- 2x2 grid
- no horizontal expanding interaction
- hover may reveal a secondary detail, but all essentials stay visible

## Mobile

One panel per row.

Each becomes a large editorial gateway:
- image/door
- animal/element
- title
- short text
- link

No swipe carousel.

---

# 2. “Quel chemin vous parle aujourd’hui ?” — situational orientation

## Purpose

Help visitors distinguish the four pages using plain-language situations without turning the page into a diagnosis/recommendation engine.

## Layout

Use four simple textual prompts separated by lines/spacing, not cards.

Examples of orientation categories:
- mieux comprendre son animal / une situation avec lui
- accompagner le vivant par une approche énergétique
- explorer un lien avec un défunt
- chercher un autre éclairage pour soi

Important:
- these are editorial signposts
- no quiz result
- no “we recommend X”
- no automatic service prescription

Each prompt deep-links to the relevant accompaniment page.

Mobile:
stacked list with clear tap target.

---

# 3. Common frame — “Ce que vous retrouverez dans mon approche”

## Purpose

Show what is common across all four offers.

Full-width editorial section.

Possible content pillars from client brief:
- bienveillance
- non-jugement
- respect
- honnêteté
- confidentialité
- douceur in transmission

Do not repeat the entire homepage values section visually.

Use prose + 2–3 highlighted principles rather than eight badges.

---

# 4. Practical modalities

## Purpose

Answer common logistical questions that apply across services.

Content supported by current client brief:
- by appointment
- remote or in person
- individual or group in some message contexts
- appointments mainly evenings / Saturdays

Important:
exact duration, price and prerequisites are **not yet fixed in project docs** and must not be invented.

Layout:
- clean two-column information band
- no pricing cards
- no fake duration icons

CTA:
**Prendre rendez-vous**

---

# 5. Boundaries / responsible frame

Especially important because two universes concern animal wellbeing and one concerns grief/deceased people.

Content:
- Laure is not a veterinarian or doctor
- no medical diagnosis
- competent professionals remain essential where needed

Design:
- calm integrated notice
- not red alert UI
- easy to find
- not hidden in footer

This section can link to FAQ if detailed boundary questions exist later.

---

# 6. FAQ preview

Questions specific to choosing/understanding accompaniments.

Possible supported questions:
- Comment se passe une séance ?
- À distance ou en présentiel ?
- Est-ce que l’animal ressent quelque chose ?
- Comment choisir l’accompagnement à découvrir ?

The final answer to “how to choose” must remain neutral and descriptive.

Pattern:
simple accordion.

CTA below:
link to full FAQ.

---

# 7. Closing booking section

Purpose:
after the visitor understands the four paths, present the next step.

Layout:
- calm full-width close
- one short statement
- one original artwork or emblem
- one primary CTA

Primary CTA:
**Prendre rendez-vous**

Secondary:
**Me contacter** only if the user still has a question.

Do not create multiple synonymous booking CTAs.

---

# 21st adaptation concept

Most useful reference families:
- Expand on hover
- Fluid Expanding Grid
- Service Grid
- Interactive Selector

What we keep:
- expandable focus
- one active item gets more visual space
- selection feels responsive

What we reject:
- generic SaaS card styling
- hover-only information
- icon-grid aesthetic
- excessive scaling/tilt
- carousel behavior on mobile

---

# Accessibility / performance gate

Before implementation:
- all four destinations understandable with JS off
- keyboard access tested
- touch does not depend on hover
- 44px+ targets
- reduced motion state complete
- image dimensions reserved
- original art optimized to WebP/AVIF derivative where appropriate
- no lazy loading for any above-the-fold LCP artwork if used
- no layout shift from panel expansion

---

# Owner review decisions needed

1. Does the 4-panel expanding landscape feel right for the Accompagnements page?
2. Should the page remain primarily explanatory, with booking only after the four paths?
3. Is the “Quel chemin vous parle aujourd’hui ?” wording appropriate, or should it be more grounded/direct?
4. Does each universe feel distinct without becoming four separate mini-brands?
