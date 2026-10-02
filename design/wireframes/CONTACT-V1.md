# Contact — Page Wireframe V1

Status: **working design draft**

Last updated: 2026-10-02

URL:
`/contact/`

Form system:
**Forminator**

## Page job

Give visitors a simple route for general questions that are not appointment booking.

Contact and booking remain distinct:
- Contact = message/question;
- Prendre rendez-vous = Timetics scheduling.

---

# 1. Hero / intro

Compact:
- H1 **Contact**
- short explanation;
- clarify that appointments can be booked directly via the booking page.

No oversized hero.

---

# 2. Contact form

Preferred minimum fields:
1. Nom
2. Email
3. Message

Add “Sujet” only if Laure has an operational need to triage messages; do not add it merely because contact forms usually have one.

Form UX:
- visible labels;
- required indicators;
- helper text only when needed;
- field-level error message;
- preserve input after validation error;
- submit loading state;
- clear success confirmation.

CTA:
**Envoyer**

Do not use vague “Soumettre”.

## Privacy

- show necessary privacy information/consent text according to Complianz/legal setup;
- do not pre-check optional consent;
- collect only necessary data.

## Spam protection

Prefer unobtrusive protection supported by the stack:
- honeypot/rate limiting/plugin protections where appropriate;
- avoid visual puzzles unless actually necessary.

---

# 3. Direct contact information

21st’s current contact guidance recommends a visible, human-verifiable direct route rather than a form that feels like a black box.

For this project:
- if Laure approves a public professional email address, display it as selectable text + mailto link;
- do not invent or expose a private address;
- phone/address only if Laure explicitly wants them public.

Do not promise a response time unless Laure commits to it.

If a response-time statement is later supplied, show it near the form.

---

# 4. Booking handoff

Small callout:
“Vous souhaitez prendre rendez-vous ?”

Action:
**Prendre rendez-vous**

Links to:
`/prendre-rendez-vous/`

Do not embed Timetics on Contact.

---

# 5. Success state

After successful Forminator submission:
- replace/confirm form area with a clear message;
- retain navigation;
- optionally provide link back to Accompagnements.

Dedicated `/merci/` page can be used if preferred for analytics, but must be **noindex**.

Do not promise email confirmation unless configured.

---

# 21st reference

Current guidance:
https://news.21st.dev/blog/react-contact-section-components

Adopted principles:
- form should not feel like a void;
- keep fields minimal;
- show direct contact route when appropriate;
- confirm successful submission clearly.

Implementation remains Forminator/WordPress, not React.

---

# Inputs needed

- approved public email/contact details;
- whether “Sujet” is useful;
- expected reply wording if any;
- Forminator notification recipient/configuration.
