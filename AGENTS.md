# AI Project Instructions — Le Moulin de Laure

These are repository-level instructions for AI coding agents.

## Current project state

A written client vision / brand brief was received on **2026-10-02**. The service universes, audience, values, tone, website goals and visual intent are documented in:

- `design/brand/BRAND-GUIDELINES-WORKING.md`
- `docs/SITE-ARCHITECTURE.md`
- `design-system/BRIEF.md`

The visual foundations were explicitly approved by the project owner on **2026-10-02**:
- palette;
- typography;
- logo variants and usage rules.

`design-system/MASTER.md` is **active**.

V1 UX/content architecture exists for all public top-level pages.

SEO research/strategy exists at:
- `docs/SEO-SERP-RESEARCH-2026-10-02.md`
- `docs/SEO-STRATEGY-V1.md`
- `docs/SEO-PAGE-MAP-V1.md`

## Source of truth and precedence

When instructions conflict, use this order:

1. Explicit user request in the current task
2. Later explicit client/owner decisions
3. Client source material
4. `design/brand/BRAND-GUIDELINES-WORKING.md`
5. `docs/SITE-ARCHITECTURE.md`
6. `docs/SEO-STRATEGY-V1.md` for SEO/content intent
7. `design-system/MASTER.md`
8. Approved production behavior/content
9. Page-specific approved override
10. Existing reusable components/tokens
11. Frontend Design Pro
12. UI/UX Pro Max
13. Taste Skill
14. 21st references
15. Generic conventions/trends

SEO research never overrides a client fact.

## Required workflow

Before meaningful page/content/frontend work:
1. read `docs/PROJECT.md`;
2. read brand guidelines;
3. read site architecture;
4. read SEO strategy/page map;
5. read design Master;
6. read current page wireframe/reference;
7. inspect real assets/content;
8. implement only source-supported content.

## Content and naming

Current approved architecture uses **Accompagnements** and **Journal**.

Current public service labels:
- Communication animale
- Accompagnement énergétique animalier
- Connexion avec les défunts
- Guidance pour soi

The project owner approved the public communication-service wording **Communication animale** on 2026-10-02. Canonical slug: `/accompagnements/communication-animale/`. Client-source quotations may still preserve “communication animalière” when documenting the original brief.

## Credential safety — Laila Del Monte

Do not publish “certifiée par Laila Del Monte” by default.

The current official Laila Del Monte site explicitly states that no communication-animal professional is certified by Laila Del Monte and distinguishes communication-animal training from energetic care and deceased-animal communication.

Until Laure supplies documentary wording:
- use “quatre ans de formation” only if approved;
- refer to the school/training exactly as evidenced;
- do not imply the training covers energetic care;
- do not imply the training covers communication with the deceased.

See:
`docs/SEO-SERP-RESEARCH-2026-10-02.md`.

## Tone

- French
- vouvoiement
- accessible
- informative
- warm/gentle
- grounded
- light humour possible
- avoid overly esoteric language

## Sensitive / medical rule

Never claim veterinary or medical diagnosis/treatment.

Do not invent efficacy claims.

Do not exploit grief/vulnerability.

Do not present guidance as prediction/certainty.

## Approved visual foundations

Canonical:
`design-system/MASTER.md`

Do not replace approved palette/type/logo.

## WordPress

- never modify WordPress core;
- never modify Astra parent theme;
- project theme work in child theme;
- custom FAQ code in project plugin;
- do not vendor third-party plugins;
- Timetics is booking system;
- Rank Math is primary SEO metadata/canonical/sitemap layer unless explicitly changed.

## SEO implementation

- unique descriptive title/meta per indexable page;
- natural internal links;
- one intent owner per page;
- no keyword stuffing;
- self-canonical indexable pages;
- noindex functional pages;
- do not block noindex pages in robots.txt;
- no thin categories/tags;
- BlogPosting/Article on Journal articles;
- FAQ rich results are no longer a Google Search feature as of 2026;
- do not use QAPage for the site's own FAQ.

## AI-assisted content

Do not mass-produce SEO pages/articles.

Any AI-assisted public copy must be:
- reviewed by a human/client;
- fact-checked;
- source-safe;
- original/useful;
- accurately attributed where authorship is shown.

## Production safety

- never commit secrets/private client raw data;
- repo currently reports public;
- prefer small auditable changes;
- update `docs/HANDOFF.md` after milestones.
