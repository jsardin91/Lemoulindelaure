# Project — Le Moulin de Laure

## Project type

Client WordPress website for **Le Moulin de Laure**.

Target launch from the client brief: **beginning of January 2027**.

## Business / website goal

The website should help visitors:
- discover and understand Laure's work;
- understand why she follows this path;
- feel the values and intention behind the practice;
- choose the relevant accompaniment;
- contact Laure or book an appointment.

Initial commercial objective from the client brief: **8 to 10 appointments per month**, initially distributed mainly across communication animalière, accompagnement énergétique animalier and connexion/messages.

Appointments are primarily planned for evenings and Saturdays.

Communication animalière can span approximately three days; other sessions/messages are easier to schedule.

## CMS / frontend

- WordPress
- Astra parent theme
- Custom child theme: `lemoulindelaure-child`

## Plugins

- Rank Math — SEO
- Complianz — consent / privacy
- Forminator — contact forms
- Timetics — appointment booking
- Structured FAQ — custom FAQ structured-data plugin
- LiteSpeed Cache — performance/cache

## Current information architecture

Canonical reference: `docs/SITE-ARCHITECTURE.md`.

Primary navigation:

- Accompagnements
- Le Jardin
- À propos
- Journal
- FAQ
- Contact
- Prendre rendez-vous — primary CTA

Current accompaniment pages:

1. Communication animalière
2. Accompagnement énergétique animalier
3. Connexion avec les défunts
4. Guidance pour soi

The public editorial/blog label is **Journal**.

## Four universes

The client brief defines “Un chemin de cœur et 4 ailes”:

| Universe | Element / meaning | Accompaniment |
| --- | --- | --- |
| Écureuil | Terre / vivant | Communication animalière |
| Phénix | Feu / énergie | Accompagnement énergétique animalier |
| Tortue | Eau / famille | Connexion avec les défunts |
| Papillon | Air / messager | Guidance pour soi |

Around these universes: heart / ether / love as the connecting link.

These associations may shape navigation/storytelling, but must not replace clear HTML labels or SEO-readable page names.

## Le Jardin du Moulin

Separate from the paid accompaniment hierarchy.

Purpose: present selected experts/therapists/professionals encountered on Laure's path, subject to their agreement, with a short description and contact details.

Potential groups:
- for humans;
- for animals.

## Audience

- adult animal guardians (18+) seeking animal communication;
- people wishing to receive a message connected to deceased humans;
- professionals such as breeders/caretakers;
- people who feel called by the broader guidance/connection approach.

## Brand / content state

Written client brief received: 2026-10-02.

Visual foundations approved: 2026-10-02.

Canonical brand references:
- `design/brand/BRAND-GUIDELINES-WORKING.md`
- `design-system/MASTER.md`

Approved:
- visual palette;
- typography;
- logo variants/usage rules;
- general visual direction.

Page copy and SEO wording remain iterative.

## Git scope

Version child-theme code, custom project plugins, durable design-system documentation, safe/licensed design references, project docs and GitHub Actions.

Do not version WordPress core, Astra parent theme, third-party plugin source, uploads, cache, database dumps, credentials/secrets or production-only config.

## Current phase

1. Repository organization: complete.
2. SSH connectivity/deployment foundation: complete.
3. Child theme installed and active.
4. Client vision and services: documented.
5. Site architecture V1: documented.
6. Visual design foundations: approved and active.
7. Next: page wireframes/content architecture, SEO research, Timetics flow and implementation.
