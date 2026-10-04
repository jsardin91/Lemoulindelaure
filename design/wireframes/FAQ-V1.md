# FAQ — Page Wireframe V1

Status: **historical V1 draft; V3 provisional FAQ implemented on 2026-10-04**

The owner authorized draft answers and additional visitor questions on 2026-10-04, with wording to be revised later. V3 now has eight visible questions in `partials/v3/faq.php`: four from the client brief and four about choosing an accompaniment, medical/veterinary boundaries, deceased-message guarantees and guidance/prediction. The answers avoid unverified prices, durations and procedures. Laure still needs to review the final public wording. V3 uses native `<details>/<summary>` for keyboard access instead of a custom button accordion.

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
- H1 **Questions fréquentes**
- one short introduction
- optional contact link for questions not covered

No large artwork required.

---

# 2. FAQ list

At launch, with only four confirmed questions:
- use one simple accordion/list;
- do not create artificial categories.

Accordion requirements:
- real `button`;
- expanded state exposed;
- associated answer region;
- keyboard accessible;
- no hover-only open state;
- restrained motion.

Visual:
- Paper/Cream;
- Ink text;
- line separators;
- no card for every item.

---

# 3. Contextual links

Answers may link naturally to:
- Communication animale / communication animalière page;
- Accompagnements;
- Contact;
- Prendre rendez-vous.

Avoid repeating the same CTA after every question.

---

# 4. “Vous avez une autre question ?”

Closing band:
- short invitation;
- primary action: **Contact**
- optional secondary: **Prendre rendez-vous** if appropriate.

---

# Structured data / Google Search status

Project stack:
- Rank Math;
- custom Structured FAQ plugin.

Current Google status:
- FAQ rich results were deprecated/removed in 2026;
- therefore FAQPage schema should not be justified as a Google SERP accordion feature;
- QAPage is **not appropriate** because users cannot submit alternative answers.

If FAQPage schema is retained for semantic/non-Google reasons:
- one schema owner only;
- no duplicate output;
- visible content and structured content must match.

Do not create hidden answers solely for schema.

---

# 21st reference

Useful:
https://21st.dev/%40prebuiltui/components/faq-sections/clean-faq-section-with-filled-bg

Borrow:
- scan rhythm;
- open/close hierarchy.

Do not copy:
- slate palette;
- non-semantic click divs;
- slow transitions.

---

# Inputs required before production

Laure must provide/approve answers for the initial questions and any additional FAQ items.
