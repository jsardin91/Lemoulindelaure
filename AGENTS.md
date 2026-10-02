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

Therefore `design-system/MASTER.md` is **active** and is the visual source of truth unless a later explicit client decision supersedes it.

Page copy, SEO wording and detailed editorial content can still evolve.

## Source of truth and precedence

When instructions conflict, use this order:

1. Explicit user request in the current task
2. Later explicit client/owner decisions
3. Client source material
4. `design/brand/BRAND-GUIDELINES-WORKING.md`
5. `docs/SITE-ARCHITECTURE.md` for current IA/navigation/URL decisions
6. `design-system/MASTER.md` for approved visual foundations
7. Approved production behavior/content
8. `design-system/pages/<page>.md` for approved page-specific exceptions
9. Existing reusable components/tokens/architecture
10. Project-local `frontend-design-pro`
11. UI/UX Pro Max
12. Taste Skill
13. 21st component/pattern references
14. Generic conventions/trends

Never let an AI-generated palette, font pairing, component catalogue or trend overwrite the approved brand.

## Required workflow

For meaningful UI/UX/frontend/content architecture work:

1. Read `docs/PROJECT.md`.
2. Read `design/brand/BRAND-GUIDELINES-WORKING.md`.
3. Read `docs/SITE-ARCHITECTURE.md`.
4. Read `design-system/BRIEF.md`, `MASTER.md` and `TOOLING.md`.
5. Inspect relevant assets in `design/brand/`.
6. Use UI/UX Pro Max only for unresolved UX/design questions.
7. Use Taste Skill to challenge generic composition and improve polish.
8. Use 21st selectively for component/pattern references.
9. Translate references into WordPress/Astra rather than changing stack by default.
10. Review responsive behavior, accessibility, performance and content accuracy.

## Content and naming rules

Current public architecture uses **Accompagnements**, not “Services”, as the navigation label.

Current four accompaniment pages:

- Communication animalière
- Accompagnement énergétique animalier
- Connexion avec les défunts
- Guidance pour soi

Editorial/blog label: **Journal**.

The client source also uses “connexion à l’invisible” in one business-goal passage. The public V1 page label remains “Connexion avec les défunts” unless explicitly changed.

### Tone

- French
- vouvoiement
- accessible
- primarily informative
- warm, gentle and sincere
- a light touch of humour is welcome
- grounded/professional rather than excessively esoteric
- animal remains prominent in the brand/storytelling

### Sensitive / medical rule

Never claim veterinary or medical diagnosis/treatment.

Communication animalière and energetic content must clearly state that Laure is neither a veterinarian nor a doctor and that competent professionals remain essential when appropriate.

Do not invent efficacy claims.

## Approved visual foundations

Canonical source: `design-system/MASTER.md`.

Do not replace approved:
- palette;
- Lora / Source Sans 3 typography;
- approved logo family;
- deep-blue-led brand writing;
- cream/paper grounds and painted-art direction.

Do not distort, recolor, stretch or reconstruct the logo outside the approved variants.

## WordPress architecture

- Never modify WordPress core.
- Never modify Astra parent-theme files.
- Custom theme work belongs in `wp-content/themes/lemoulindelaure-child/`.
- Custom Structured FAQ work belongs in `wp-content/plugins/structured-faq/`.
- Do not vendor Rank Math, Complianz, Forminator, Timetics, Astra or LiteSpeed Cache.
- Preserve plugin-generated SEO/schema/privacy/form/booking behavior unless explicitly changed.
- Keep modifications upgrade-safe and rollbackable.

Timetics is the booking system. The canonical site entry point is `/prendre-rendez-vous/`.

Detailed rules: `docs/WORDPRESS-WEB-DESIGN.md`.

## SEO / indexation baseline

Canonical content structure is documented in `docs/SITE-ARCHITECTURE.md`.

Indexable content pages should have coherent title/H1/metadata and internal linking. Functional confirmation/thank-you/cancellation pages should be noindex.

Do not create categories or landing pages simply to fill the site.

## Production safety

- Never commit secrets, SSH keys, API keys, `wp-config.php`, database dumps or uploads.
- Repository currently reports as public: do not commit raw private client briefs or contact details without review.
- Do not expose server paths or credentials in logs.
- Prefer small, auditable changes.
- Update `docs/HANDOFF.md` after meaningful milestones.
