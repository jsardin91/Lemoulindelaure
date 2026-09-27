# Project — Le Moulin de Laure

## Project type

Client website.

## CMS / frontend

- WordPress
- Astra parent theme
- Custom child theme: `lemoulindelaure-child`

## Plugins

- Rank Math — SEO
- Complianz — consent / privacy
- Forminator — forms
- Structured FAQ — custom project plugin for FAQ structured data
- LiteSpeed Cache — performance/cache

## Git scope

Version child-theme code, custom project plugins, durable design-system documentation, safe/licensed design references, project docs and GitHub Actions.

Do not version WordPress core, Astra parent theme, third-party plugin source, uploads, cache, database dumps, credentials/secrets or production-only config.

## Current phase

1. Repository organization: complete.
2. SSH secrets: configured by the owner.
3. SSH connectivity: manual workflow available.
4. Production WordPress path: still to be verified.
5. Brand guidelines: waiting for client material.
6. Design system: intentionally `template`.
7. Visual implementation: not started.

## Next gate

When brand guidelines arrive:

1. store/summarize them under `design/brand/`;
2. fill `design-system/BRIEF.md`;
3. use UI/UX Pro Max + Taste Skill + 21st selectively;
4. create a coherent draft in `design-system/MASTER.md`;
5. validate with the user;
6. mark the Master `active` only after approval;
7. then implement the WordPress child theme.
