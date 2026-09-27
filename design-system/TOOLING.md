# Design Tooling Configuration

## Status

Formal guidelines: **pending**. Supplied logo, paintings and business card are now in `design/brand/source/`.

Do not finalize these values until the brand brief is available.

## UI/UX Pro Max

Role: design intelligence and UX validation.

Install/update using the repository bootstrap:

- Windows: `powershell -ExecutionPolicy Bypass -File .\scripts\setup-ui-ux-pro-max.ps1`
- macOS/Linux/WSL: `bash scripts/setup-ui-ux-pro-max.sh`

Expected locations:

- `.agents/skills/ui-ux-pro-max/`
- `.claude/skills/ui-ux-pro-max/`

## Taste Skill

Source: `https://github.com/Leonxlnx/taste-skill`

Installed name: `design-taste-frontend`

Project-local copies are vendored at:

- `.agents/skills/taste-skill/SKILL.md`
- `.claude/skills/taste-skill/SKILL.md`

Project dials:

- `DESIGN_VARIANCE`: 7 (draft; painted artwork supports a more expressive but coherent composition)
- `MOTION_INTENSITY`: 3 (draft; a subtle door response is enough and never blocks navigation)
- `VISUAL_DENSITY`: 3 (draft; leave room for original paintings and readable service content)

When the brand guidelines arrive, choose values from the actual brand, audience, content and conversion goals. Record the reason beside each value before implementation.

## 21st

Official MCP endpoint: `https://21st.dev/api/mcp`

Use cases: compare section/component directions, search existing patterns, inspect interaction ideas and generate alternatives when genuinely useful.

Project constraint: **No automatic React/shadcn/Tailwind adoption.** Production remains WordPress + Astra + child theme unless explicitly approved.

Setup instructions: `docs/21ST-MCP.md`.
