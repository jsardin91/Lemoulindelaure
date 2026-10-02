# FAQ — Page Wireframe V1

Status: **working design draft — questions sourced, answers still pending**

Last updated: 2026-10-02

URL:
`/faq/`

## Page job

Answer recurring questions clearly and reduce uncertainty before contact/booking.

The FAQ is not a place to hide important service boundaries; critical information should also exist on the relevant accompaniment page.

## Source-supplied initial questions

The client brief explicitly lists:
1. Pourquoi la communication animale ?
2. Comment se passe une séance ?
3. Est-ce en présentiel ou à distance ?
4. Est-ce que l’animal ressent quelque chose ?

The brief does **not** provide complete approved answers.

Do not invent answers before Laure confirms them.

---

# 1. Hero

Compact:
- H1 **FAQ**
- one short introduction
- optional contact link for questions not covered

No large artwork required.

---

# 2. FAQ list

At launch, with only four confirmed questions:
- use one simple accordion/list;
- do not create artificial categories.

When enough questions exist later, possible categories can be introduced only if they reflect real content.

Accordion requirements:
- real `button`;
- expanded state exposed;
- associated answer region;
- keyboard accessible;
- no hover-only open state;
- restrained motion;
- all answers readable without JS fallback where technically reasonable.

Visual:
- Paper/Cream;
- Ink text;
- line separators;
- no card for every item unless a real surface hierarchy is needed.

---

# 3. Contextual links

Answers may link naturally to:
- Communication animalière
- Accompagnements
- Contact
- Prendre rendez-vous

Avoid repeating the same CTA after every question.

---

# 4. “Vous avez une autre question ?”

Closing band:
- short invitation;
- primary action: **Contact**
- optional secondary: **Prendre rendez-vous** only if the user is already ready.

---

# Structured data / schema ownership

The project has:
- Rank Math;
- custom Structured FAQ plugin.

Before implementation:
- determine one schema owner per FAQ output;
- do not emit duplicate FAQPage schema;
- visible FAQ content and schema content must match.

No schema should contain answers that are not visible on the page.

---

# 21st reference

Useful:
https://21st.dev/%40prebuiltui/components/faq-sections/clean-faq-section-with-filled-bg

Borrow:
- clean scan rhythm;
- open/close hierarchy.

Do not copy:
- slate palette;
- non-semantic click divs;
- long 500ms transitions.

Project version should use semantic buttons and the approved design system.

---

# Inputs required before production

Laure must provide/approve answers for the four initial questions and any additional FAQ items.
