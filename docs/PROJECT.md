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
3. SSH connectivity: tested successfully in GitHub Actions.
4. Production WordPress installation: uniquely located and checked for Astra and WP-CLI without recording its document root in logs or the repository.
5. Visual references: logo and four paintings received; formal brand guidelines pending.
6. Design system: `draft` palette and typography benchmark, awaiting client approval.
7. Astra child theme: installed and active on https://lemoulindelaure.fr; live header logo, stylesheet, palette and typefaces verified. Sample WordPress content remains and portal assets are not placed in pages yet.

## Next gate

When the complete formal brand guidelines arrive:

1. store/summarize them under `design/brand/`;
2. fill `design-system/BRIEF.md`;
3. use UI/UX Pro Max + Taste Skill + 21st selectively;
4. reconcile the existing draft in `design-system/MASTER.md` with the guidelines;
5. validate with the user and client;
6. mark the Master `active` only after approval;
7. then implement the WordPress child theme.
