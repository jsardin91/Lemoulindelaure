# Le Moulin de Laure

Repository for the **Le Moulin de Laure** client website.

## Status

**Foundation ready. Brand/design work is intentionally blocked until the client brand guidelines are received.**

Do not invent a palette, typography system, visual language, or art direction before those guidelines are added to `design/brand/` and reflected in `design-system/BRIEF.md`.

## WordPress stack

- WordPress
- Astra parent theme
- Custom child theme: `lemoulindelaure-child`
- Rank Math
- Complianz
- Forminator
- Structured FAQ custom plugin
- LiteSpeed Cache

## Design toolchain

This project deliberately combines:

1. **UI/UX Pro Max** for design intelligence, UX checks and design-system research.
2. **Taste Skill** (`design-taste-frontend`) for anti-generic visual quality and layout/art-direction discipline.
3. **21st MCP / CLI** for component and pattern exploration.

The client brand always wins over generated recommendations.

For this WordPress project, 21st components are primarily **reference material**. Do not introduce React/shadcn/Tailwind into production merely because a 21st component uses them. Translate useful patterns into the existing WordPress/Astra/child-theme architecture unless a stack change is explicitly approved.

## Repository map

```text
.
├── AGENTS.md
├── CLAUDE.md
├── .agents/skills/
│   ├── frontend-design-pro/
│   └── taste-skill/
├── .claude/skills/
│   ├── frontend-design-pro/
│   └── taste-skill/
├── design/
│   ├── brand/
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
├── scripts/
├── licenses/
├── wp-content/
│   ├── themes/lemoulindelaure-child/
│   └── plugins/structured-faq/
└── .github/workflows/
```

## Before any visual work

Read, in order:

1. `AGENTS.md`
2. `docs/PROJECT.md`
3. `design/brand/README.md`
4. `design-system/BRIEF.md`
5. `design-system/MASTER.md`
6. `design-system/TOOLING.md`
7. `docs/AI-DESIGN-WORKFLOW.md`

## Deployment

GitHub Actions SSH secrets are configured separately. The diagnostic workflow verified exactly one WordPress installation with Astra and WP-CLI without exposing server paths. The child theme was installed and activated on https://lemoulindelaure.fr by the `Install Astra child theme` workflow. Future deployments are manual (`workflow_dispatch`); changing theme files on `main` alone does not update the live site.

## Security

This is a client project. Keep the repository **private** before adding brand files, private documents, credentials, database exports, production paths or other client-sensitive material.
