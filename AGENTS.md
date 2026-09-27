# AI Project Instructions

These are repository-level instructions for AI coding agents.

Keep this file concise. Detailed design methodology lives in the project-local
skills and reference files.

## Source of truth and precedence

When instructions conflict, use this order:

1. Explicit user request in the current task
2. Existing approved brand identity and real production behavior
3. `design-system/MASTER.md` when its status is `active`
4. `design-system/pages/<page>.md` for deliberate page-specific overrides
5. Existing reusable components, tokens, architecture, and conventions
6. Project-local `frontend-design-pro` skill
7. Project-local `ui-ux-pro-max` skill, if installed
8. General UX conventions
9. Trends and stylistic preferences

Never let a generic preset, trend, generated palette, or font pairing replace an
approved brand system.

## Required design workflow

For meaningful UI, UX, frontend, responsive, layout, component, page-design, or
visual-quality work:

1. Use the `frontend-design-pro` project skill.
2. Read `design-system/MASTER.md`.
3. If a matching `design-system/pages/<page>.md` exists, read it.
4. Inspect the current implementation before inventing a replacement.
5. Use UI UX Pro Max as supporting design intelligence when installed.
6. Default to `EVOLVE` mode on existing sites.
7. Review the implemented result visually when browser/screenshot tooling exists.
8. Check responsive behavior, accessibility basics, and obvious performance impact.

## UI UX Pro Max

UI UX Pro Max is optional but strongly recommended.

Expected project-local locations after running the bootstrap script:

- Codex: `.agents/skills/ui-ux-pro-max/`
- Claude Code: `.claude/skills/ui-ux-pro-max/`

Its recommendations are advisory. Approved brand rules win.

Do not install software silently. If the skill is missing and installation is
required, tell the user to run the repository bootstrap script.

## Design-system status

`design-system/MASTER.md` has a status.

- `template`: placeholders are NOT approved design decisions.
- `draft`: proposed system; do not treat unapproved choices as immutable.
- `active`: approved source of truth.
- `deprecated`: historical only.

If status is `template`, use real existing site styles and explicit user context
as authority. Do not invent a new brand merely to fill the template.

## Design mode

### EVOLVE

Default for existing sites.

Preserve the recognizable identity and improve:
- hierarchy
- composition
- spacing
- usability
- conversion clarity
- responsive behavior
- accessibility
- performance
- visual polish

Do not redesign unrelated sections.

### REDESIGN

Use only when the user explicitly requests or approves a new visual direction.

## WordPress

When this repository contains WordPress:

- never modify WordPress core for design work
- prefer the child theme or an approved custom plugin
- inspect existing theme settings and CSS before overriding
- reuse existing design tokens and components where possible
- avoid unnecessary `!important`
- avoid loading a second font system without approval
- keep changes upgrade-safe
- avoid page-specific hacks when a reusable component is appropriate
- validate PHP when modifying PHP
- preserve rollbackability

Read `docs/WORDPRESS-WEB-DESIGN.md` for detailed rules.

## Implementation discipline

Before changing code:

- inspect related files and selectors
- identify the smallest reasonable implementation surface
- avoid duplicate rules and specificity wars
- preserve naming conventions
- avoid unrelated cleanup
- preserve content, SEO, localization, and accessibility behavior unless the task requires changes

After changing code:

- inspect the diff
- run relevant validation/tests when available
- verify the changed page/component
- visually inspect meaningful design work when possible
- report any limitation that prevented visual verification

## Keep project instructions healthy

Do not continuously append task history to this file.

Persistent brand decisions belong in:
- `design-system/MASTER.md`
- `design-system/DECISIONS.md`
- page overrides when genuinely page-specific

Task-specific notes belong in the task/conversation, not in permanent instructions.
