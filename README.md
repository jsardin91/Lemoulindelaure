# Le Moulin de Laure

Repository for the **Le Moulin de Laure** client website.

## Status

The project foundation, client vision, service architecture and visual foundations are now documented.

**Visual system status: ACTIVE (approved 2026-10-02).**

Approved foundations include:
- color palette;
- typography;
- logo variants and usage rules;
- general visual direction.

Editorial copy and detailed page content can still evolve without reopening the approved visual foundations.

## WordPress stack

- WordPress
- Astra parent theme
- Custom child theme: `lemoulindelaure-child`
- Rank Math
- Complianz
- Forminator
- Timetics — appointment booking
- Structured FAQ custom plugin
- LiteSpeed Cache

Third-party plugins are not vendored in this repository.

## Canonical project references

Read these before meaningful work:

1. `AGENTS.md`
2. `docs/PROJECT.md`
3. `design/brand/BRAND-GUIDELINES-WORKING.md`
4. `docs/SITE-ARCHITECTURE.md`
5. `design-system/BRIEF.md`
6. `design-system/MASTER.md`
7. `design-system/TOOLING.md`
8. `docs/AI-DESIGN-WORKFLOW.md`

## Current public architecture

Primary navigation:

**Accompagnements · Le Jardin · À propos · Journal · FAQ · Contact · [Prendre rendez-vous]**

Accompagnements:
1. Communication animalière
2. Accompagnement énergétique animalier
3. Connexion avec les défunts
4. Guidance pour soi

The public editorial/blog label is **Journal**.

Canonical slugs, page roles, SEO rules and booking flow are documented in `docs/SITE-ARCHITECTURE.md`.

## Design toolchain

This project combines:

1. **UI/UX Pro Max** for structured UX/design research.
2. **Taste Skill** for anti-generic composition and visual polish.
3. **21st MCP / CLI** for component/pattern exploration.

These tools are advisory. The approved client brand and `design-system/MASTER.md` win.

Production remains WordPress + Astra + child theme. Do not introduce React/shadcn/Tailwind simply because a reference uses them.

## Repository map

```text
.
├── AGENTS.md
├── CLAUDE.md
├── .agents/skills/
├── .claude/skills/
├── design/
│   ├── brand/
│   │   ├── BRAND-GUIDELINES-WORKING.md
│   │   ├── source/
│   │   └── doors/
│   ├── references/
│   ├── reviews/
│   └── wireframes/
├── design-system/
│   ├── BRIEF.md
│   ├── MASTER.md
│   ├── DECISIONS.md
│   ├── TOOLING.md
│   └── pages/
├── docs/
│   ├── SITE-ARCHITECTURE.md
│   └── ...
├── scripts/
├── licenses/
├── wp-content/
│   ├── themes/lemoulindelaure-child/
│   └── plugins/structured-faq/
└── .github/workflows/
```

## Deployment

GitHub Actions SSH secrets are configured separately. The child theme is installed and active on https://lemoulindelaure.fr. Production releases remain manual/reviewable; changing files on `main` alone does not necessarily update the live site.

## Security / client material

The repository currently reports as **public**. Do not commit raw private client briefs, personal contact details, credentials, database exports or other sensitive material without an explicit privacy review.

The client Word brief received on 2026-10-02 is summarized in durable repository documentation instead of being committed as a raw source file.
