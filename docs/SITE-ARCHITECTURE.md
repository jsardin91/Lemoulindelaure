# Site Architecture V1 — Le Moulin de Laure

Status: **approved project working architecture**

Last updated: 2026-10-02

This document is the canonical reference for the current information architecture, page names, URL strategy and navigation.

The detailed content of pages may evolve. Structural changes should be recorded here.

## Global tree

```text
/
├── Accueil
├── Accompagnements
│   ├── Communication animale
│   ├── Accompagnement énergétique animalier
│   ├── Connexion avec les défunts
│   └── Guidance pour soi
├── Le Jardin du Moulin
├── À propos
├── Journal
│   └── Articles
├── FAQ
├── Contact
├── Prendre rendez-vous
└── Legal / functional pages
```

## Canonical URLs

| Page | URL | Indexation |
| --- | --- | --- |
| Accueil | `/` | index |
| Accompagnements | `/accompagnements/` | index |
| Communication animale | `/accompagnements/communication-animale/` | index |
| Accompagnement énergétique animalier | `/accompagnements/accompagnement-energetique-animalier/` | index |
| Connexion avec les défunts | `/accompagnements/connexion-defunts/` | index |
| Guidance pour soi | `/accompagnements/guidance-pour-soi/` | index |
| Le Jardin du Moulin | `/le-jardin/` | index |
| À propos | `/a-propos/` | index |
| Journal | `/journal/` | index |
| Article | `/journal/[slug]/` | index when editorially valid |
| FAQ | `/faq/` | index |
| Contact | `/contact/` | index |
| Prendre rendez-vous | `/prendre-rendez-vous/` | index |
| Merci | `/merci/` | noindex |
| Réservation confirmée | `/reservation-confirmee/` | noindex |
| Réservation annulée | `/reservation-annulee/` if needed | noindex |
| 404 | native | noindex |

Do not create public Journal categories before the editorial/SEO strategy justifies them.

## Header navigation

Recommended order:

**Accompagnements · Le Jardin · À propos · Journal · FAQ · Contact · [Prendre rendez-vous]**

- Logo links to home.
- “Prendre rendez-vous” is the primary CTA.
- “Accompagnements” can use a dropdown exposing the four clear service labels.

## Footer

Recommended groups:

### Découvrir
- Accompagnements
- Le Jardin
- À propos
- Journal
- FAQ

### Contact
- Contact
- Prendre rendez-vous

### Informations
- Mentions légales
- Politique de confidentialité
- Gestion des cookies
- CGV/CGS if legally applicable

## Homepage role

The homepage introduces the purpose and routes visitors to the correct universe.

Suggested content sequence:

1. Hero / value proposition
2. Why Le Moulin de Laure exists
3. “Un chemin de cœur et 4 ailes”
4. Four accompaniment gateways
5. Short Laure introduction
6. How it works
7. Testimonials
8. FAQ preview
9. Latest Journal content
10. Primary booking CTA

The four animal/element associations can be used as storytelling and visual navigation, but clear textual labels must remain visible.

## Accompagnements hub

URL: `/accompagnements/`

Purpose:
- explain the overall approach;
- compare the four accompaniments without ranking them;
- route visitors to the relevant page;
- provide a clear booking CTA.

The “doors opening to universes” concept is especially suitable here.

## Communication animale

URL: `/accompagnements/communication-animale/`

Suggested structure:
- what it is;
- why communicate differently with an animal;
- situations / animals concerned;
- how a communication takes place;
- remote / in-person information;
- Laure's training/expertise;
- boundaries and veterinary disclaimer;
- specific FAQ;
- booking CTA.

Important source point: Laure reports four years of training at the school of Laila Del Monte. Final public wording should be fact-checked before publication.

## Accompagnement énergétique animalier

URL: `/accompagnements/accompagnement-energetique-animalier/`

Suggested structure:
- presentation;
- situations / intent;
- how the accompaniment works;
- remote / in-person;
- role of the animal guardian;
- boundaries / veterinary disclaimer;
- FAQ;
- booking CTA.

Do not make medical/veterinary efficacy claims.

## Connexion avec les défunts

URL: `/accompagnements/connexion-defunts/`

Suggested structure:
- sensitive introduction;
- intention;
- who it is for;
- how a session works;
- individual/group modalities where applicable;
- confidentiality and emotional frame;
- FAQ;
- booking CTA.

Tone should be especially calm, respectful and non-sensational.

## Guidance pour soi

URL: `/accompagnements/guidance-pour-soi/`

Suggested structure:
- presentation;
- situations / questions that may bring someone here;
- intended role of guidance;
- how a session works;
- remote / in-person;
- FAQ;
- booking CTA.

Avoid deterministic promises or claims.

## Le Jardin du Moulin

URL: `/le-jardin/`

This is not a fifth accompaniment.

Purpose:
- present complementary experts/professionals encountered by Laure;
- show that different approaches can meet and complement one another;
- provide a short description and contact details with each person's consent.

Potential sections:
- for animals;
- for humans.

## À propos

URL: `/a-propos/`

Suggested structure:
- Laure's story;
- why animal communication;
- journey;
- training;
- vision;
- values;
- approach;
- professional photo.

## Journal

URL: `/journal/`

Public label is **Journal**, not Blog.

At launch:
- archive/listing page;
- individual articles;
- no public categories unless SEO/editorial strategy validates them.

The Journal should support expertise, reassurance, internal linking and discoverability rather than exist merely for posting frequency.

## FAQ

URL: `/faq/`

Initial client questions:
- Pourquoi la communication animale ?
- Comment se passe une séance ?
- Est-ce en présentiel ou à distance ?
- Est-ce que l’animal ressent quelque chose ?

Use the custom Structured FAQ solution where technically appropriate without duplicating Rank Math/schema output.

## Contact

URL: `/contact/`

Purpose: general questions/messages, not appointment scheduling.

Forminator owns the contact form.

Suggested fields:
- name;
- email;
- subject;
- message.

Secondary CTA: booking.

## Prendre rendez-vous / Timetics

URL: `/prendre-rendez-vous/`

Timetics is the appointment-booking system.

Principles:
- keep one canonical branded WordPress entry point;
- present the accompaniment choice clearly before or alongside the calendar;
- map the selected accompaniment to the relevant booking configuration where technically possible;
- reflect evening/Saturday availability configured by Laure;
- keep confirmations/cancellations functional and noindex;
- do not create duplicate indexable Timetics landing pages.

Every accompaniment page should be able to route to the booking flow with the relevant context.

## SEO baseline

- one coherent H1 per page;
- unique title/meta description based on validated search intent;
- clear internal linking between hub and accompaniment pages;
- avoid keyword stuffing;
- preliminary client keywords are inputs, not the final SEO strategy;
- no medical/veterinary claims;
- functional pages noindex;
- do not create thin category/tag archives.

## Legal / artwork

The client explicitly asked to consider “tous droits réservés” for her paintings.

Before launch:
- confirm the legal wording in the legal notice/footer;
- preserve authorship/copyright treatment for original artwork;
- do not expose source artwork for unrelated reuse;
- keep privacy/cookies handled by the relevant legal/consent setup.
