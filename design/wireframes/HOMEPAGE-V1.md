# Homepage Wireframe V1 — Le Moulin de Laure

Status: **working design draft — ready for owner review, not yet implementation-approved**

Last updated: 2026-10-02

## Sources used

Project:
- `design/brand/BRAND-GUIDELINES-WORKING.md`
- `design-system/MASTER.md`
- `docs/SITE-ARCHITECTURE.md`

Design intelligence:
- local UI/UX Pro Max skill
- local Taste Skill
- local Frontend Design Pro skill
- public 21st component previews documented in `design/references/21ST-HOMEPAGE-REFERENCES.md`

## Page job

The homepage must help a first-time visitor quickly understand:
1. what Le Moulin de Laure is;
2. what kinds of accompaniment exist;
3. why Laure's approach can be trusted/respected;
4. which path to explore;
5. how to take the next step.

Primary business action:
**Prendre rendez-vous**

Secondary discovery action:
**Découvrir les accompagnements**

## Visual thesis

**The Moulin as a threshold into four living universes.**

The page begins grounded and readable, then opens into the four universes through the door/painting system.

The design should feel:
- editorial rather than template-like;
- organic rather than geometric/SaaS;
- expressive but calm;
- colorful but not childish;
- spiritual/intuitive without becoming visually esoteric;
- handmade through the client's actual artwork.

## Design-system interpretation

UI/UX Pro Max direction selected:
- Storytelling + trust/social proof;
- Organic/Biophilic influence;
- editorial/magazine hierarchy;
- booking kept obvious;
- mobile-first;
- accessible interaction.

Taste Skill constraints applied:
- no centered generic hero;
- no repeated card-grid language;
- at least four layout families across the page;
- no more than one eyebrow per three sections;
- no duplicate CTA wording for the same intent;
- hero must fit inside the initial viewport;
- real imagery/artwork must carry the page;
- explicit mobile collapse per multi-column section.

## Global page rhythm

Recommended section count: **9 core sections + footer**

Layout families used:
1. asymmetric split hero;
2. full-width manifesto;
3. portal/gallery composition;
4. editorial split;
5. ordered process line;
6. full-width trust/value field;
7. editorial garden teaser;
8. magazine/article grid;
9. FAQ + booking split.

This intentionally avoids repeating the same 3-card or image/text zigzag pattern.

---

# 0. Header

## Desktop

Height target:
- 68–72px
- hard cap: 80px

Structure:
- left: approved horizontal logo;
- center/right: navigation;
- far right: primary booking CTA.

Navigation:
- Accompagnements
- Le Jardin
- À propos
- Journal
- FAQ
- Contact
- **Prendre rendez-vous**

Behavior:
- logo -> home;
- subtle sticky state after scroll;
- no oversized header;
- no two-line desktop nav.

Breakpoint rule:
- full nav only while it fits on one line;
- switch to compact/hamburger before crowding;
- do not shrink text below comfortable reading size.

Mobile:
- logo left;
- menu trigger right;
- booking CTA remains easy to reach inside menu;
- 44px+ interactive targets.

---

# 1. Hero — “Entrer dans le Moulin”

## Purpose

Introduce the brand without asking visitors to understand four services immediately.

## Composition

Desktop:
- 12-column grid;
- copy: approximately 5 columns;
- visual: approximately 7 columns;
- left-aligned copy;
- visual collage deliberately extends toward page edge.

Do not center the whole hero.

Hero content maximum:
1. optional short brand line OR none;
2. H1;
3. short support text;
4. CTA group.

## Copy rules

H1:
- descriptive, human and SEO-aware;
- maximum 2 lines desktop;
- final wording not locked in this document.

Brand signature:
**Au cœur du lien, au-delà des sens.**

Recommended use:
supporting brand line rather than forcing it to carry all SEO meaning alone.

Support copy:
- maximum ~20 words in the hero;
- detailed philosophy moves to section 2.

Actions:
- primary discovery: **Découvrir les accompagnements**
- secondary/high-intent: **Prendre rendez-vous**

Use these labels consistently wherever these intents recur.

## Visual asset

Use an **editorial collage of the four original paintings**, not generic stock photography.

Possible composition:
- one dominant artwork;
- two partially cropped supporting artworks;
- fourth artwork as a smaller counterweight;
- emblem or logo mark used sparingly as connective detail;
- subtle paper-edge / overlap rhythm;
- no fake Polaroid gimmick unless visually validated.

Do not use the four door assets here as the main hero device; preserve the door reveal as the signature of section 3.

## Motion

Allowed:
- very subtle 4–8px drift/parallax on one or two decorative layers;
- soft hover response if an artwork is interactive.

Not allowed:
- continuous floating of every image;
- scroll-jacking;
- large WebGL/shader effect;
- motion required to understand content.

Reduced motion:
static final composition.

## Mobile

- copy first;
- CTA visible before image collage;
- collage becomes a compact 2/2 overlapping arrangement or one lead image + supporting crops;
- no horizontal scrolling;
- hero remains within a reasonable initial viewport.

---

# 2. Manifesto — “Pourquoi Le Moulin de Laure”

## Purpose

Explain the emotional “why” before presenting offers.

## Layout family

Full-width editorial statement.

This section can be more centered than the hero because the message itself is the design.

Visual structure:
- generous vertical spacing;
- one large Lora statement;
- 1–2 short supporting paragraphs;
- optional small original-art detail in one corner.

Content source:
client's story about seeking another way to communicate with animals and deepening the bond.

Avoid:
- 3 feature cards;
- icon bullets;
- excessive decorative quotes.

Transition:
a subtle line/illustrated path can lead visually into the four doors.

---

# 3. Signature section — “Un chemin de cœur et 4 ailes”

## Purpose

This is the homepage's memorable interaction and primary route to the four accompaniments.

## Layout family

**Portal gallery / four doors**

Desktop:
- four vertical portal zones;
- varied but balanced widths are allowed;
- each portal displays:
  - door artwork;
  - animal;
  - element;
  - explicit accompaniment name;
  - short one-sentence intention;
  - visible link affordance.

Mapping:
- Écureuil / Terre / vivant -> Communication animalière
- Phénix / Feu / énergie -> Accompagnement énergétique animalier
- Tortue / Eau / famille -> Connexion avec les défunts
- Papillon / Air / messager -> Guidance pour soi

## Interaction

Default:
- service name is always readable;
- door is not the only clickable affordance.

Hover/focus:
- slight door opening or reveal;
- 1–3 degree/very small translate movement;
- reveal a little more of the associated artwork/color field;
- label contrast stays stable.

Focus:
- obvious visible focus state;
- identical content access as hover.

Reduced motion:
- no door movement;
- static open/closed visual state with clear labels.

## Mobile

< 768px:
- one portal per row or compact 2-column layout where legible;
- do not use a horizontal swipe-only carousel;
- artwork ratio reduced;
- title remains visible without interaction.

## Important

These are **not generic cards**.

They should feel like four thresholds in one visual scene.

---

# 4. Laure — credibility and human presence

## Purpose

Answer:
“Who is behind this, and why should I trust the approach?”

## Layout family

Asymmetric editorial split.

Desktop suggestion:
- portrait/artwork column: 5/12;
- content: 6/12;
- 1 column negative space used intentionally.

Content:
- short personal introduction;
- path/experience;
- training in communication animalière;
- values;
- link to À propos.

Credibility highlight:
use a typographic fact, not a badge/card:
**4 ans de formation** (public wording must be validated before launch).

Photo:
- use Laure's real professional portrait when supplied;
- do not generate a fake portrait;
- before portrait exists, use a clearly identified project placeholder in wireframe/implementation drafts only.

---

# 5. “Comment avancer ?” — practical process

## Purpose

Reduce uncertainty without pretending every accompaniment has the same detailed workflow.

## Layout family

Ordered process line, no cards.

Recommended 3 steps:
1. Découvrir l'accompagnement adapté
2. Prendre contact ou choisir un créneau
3. Recevoir les informations propres à l'accompagnement

Final wording must be checked against actual service operations.

Desktop:
- horizontal baseline / three columns;
- numbers matter because order matters.

Mobile:
- vertical timeline;
- number + title + short text;
- no decorative zigzag.

CTA at end:
**Prendre rendez-vous**

---

# 6. “Ce qui guide ma pratique” — values + boundaries

## Purpose

Create trust and prevent ambiguity about Laure's posture.

## Layout family

Full-width deep-blue or tinted field, not a set of mini-cards.

Content:
- bienveillance;
- empathie;
- non-jugement;
- amour du vivant;
- humilité;
- honnêteté;
- respect;
- confidentialité.

Do not display all eight as pill badges.

Composition idea:
- one strong heading;
- 3–4 values in larger typographic rhythm;
- remaining values integrated in prose or secondary line.

Mandatory practical note:
Laure is not a veterinarian or doctor and does not make medical diagnoses; appropriate professionals remain essential when needed.

Tone:
clear and reassuring, not alarmist.

---

# 7. Le Jardin du Moulin — teaser

## Purpose

Show the wider ecosystem without confusing it with a fifth service.

## Layout family

Editorial band / landscape strip.

Content:
- short explanation;
- “des regards différents peuvent se rencontrer et se compléter” idea;
- link: **Découvrir le Jardin**.

Visual:
- use green/teal/cream palette;
- restrained brand motif;
- avoid adding fake partner logos or fake practitioners.

If no partner list is ready:
the teaser can exist, but do not imply people are already listed.

---

# 8. Journal — latest content

## Purpose

Build expertise, reassurance, internal linking and SEO depth.

## Layout family

Editorial magazine grid.

Desktop:
- one featured article occupying ~60%;
- two smaller supporting article rows/tiles;
- image-led, not three identical cards.

Mobile:
- featured first;
- supporting articles stacked;
- clear article metadata.

Do not show an empty Journal module on production.

If no real launch articles exist:
hide this homepage section until content exists.

Public label:
**Journal**

---

# Conditional section — Reviews

Activate only when real, approved reviews exist.

Recommended location:
after Laure/trust content and before Journal.

Pattern:
- 2–3 strong reviews visible;
- manual carousel or static editorial quotes;
- no autoplay required;
- no invented photos;
- no fabricated star rating.

Reference:
`design/references/21ST-HOMEPAGE-REFERENCES.md`.

---

# 9. FAQ + booking conversion

## Purpose

Resolve the last common objections and provide a clear next action.

## Layout family

Two-part split:
- left ~7/12: FAQ accordion;
- right ~5/12: booking panel / visual.

Initial questions:
- Pourquoi la communication animale ?
- Comment se passe une séance ?
- Est-ce en présentiel ou à distance ?
- Est-ce que l’animal ressent quelque chose ?

Booking panel:
- simple;
- one approved artwork/emblem;
- short booking message;
- primary CTA: **Prendre rendez-vous**.

No secondary booking wording such as:
- Réserver
- Je prends rendez-vous
- Choisir mon créneau

unless a later UX decision explicitly changes the global CTA vocabulary.

## Timetics note

This CTA routes to:
`/prendre-rendez-vous/`

The homepage should not embed the full booking calendar unless later testing shows a strong reason.

---

# Footer

Use the architecture already documented in `docs/SITE-ARCHITECTURE.md`.

Visual direction:
- calm deep-blue or cream close;
- no oversized CTA repeated a third time;
- accessible legal links;
- copyright treatment for artwork to be finalized.

---

# Responsive summary

## < 768px

- navigation -> menu;
- hero copy first, collage second;
- doors -> 1 column or legible 2-column;
- Laure section -> image then text;
- process -> vertical;
- values -> stacked editorial flow;
- Journal -> featured then stack;
- FAQ/booking -> FAQ first, CTA second.

## 768–1179px

- compact navigation if full nav becomes crowded;
- hero remains split only if image/copy remain readable;
- doors 2x2 acceptable;
- no layout should rely on hover.

## >= 1180px

Use full editorial composition.

---

# Asset inventory for homepage

Already available:
- full logo variants;
- emblem;
- four original paintings;
- four generated door masters;
- approved fonts;
- approved palette.

Still needed / optional:
- real professional portrait of Laure;
- actual verified reviews;
- launch Journal images/articles;
- final partner/professional information for Le Jardin.

Do not generate substitutes for personal portrait/reviews.

---

# Pre-implementation gate

Before coding the homepage:

1. owner reviews this wireframe;
2. lock or adjust section order;
3. validate whether Review section is available at launch;
4. validate hero copy direction;
5. validate door interaction concept;
6. then Codex/Claude may use 21st MCP to preview 2–3 candidate compositions for the selected sections;
7. implement in WordPress/Astra child theme;
8. review at 375 / 768 / 1024 / 1440;
9. test keyboard, reduced motion, contrast and performance.

No production implementation is authorized by this wireframe alone.
