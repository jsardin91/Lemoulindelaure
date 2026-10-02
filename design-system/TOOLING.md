# Design Tooling Configuration

## Status

Client brief: received.

Visual foundations: **approved 2026-10-02**.

Canonical visual source:
- `MASTER.md`

Typography decision:
- `TYPOGRAPHY-BENCHMARK.md`

Tools below are advisory and must not overwrite the active Master Design System.

## UI/UX Pro Max

Role: design intelligence and UX validation for unresolved questions.

Install/update using the repository bootstrap:

- Windows: `powershell -ExecutionPolicy Bypass -File .\scripts\setup-ui-ux-pro-max.ps1`
- macOS/Linux/WSL: `bash scripts/setup-ui-ux-pro-max.sh`

Expected locations:
- `.agents/skills/ui-ux-pro-max/`
- `.claude/skills/ui-ux-pro-max/`

## Taste Skill

Source: `https://github.com/Leonxlnx/taste-skill`

Installed name: `design-taste-frontend`

Project-local copies:
- `.agents/skills/taste-skill/SKILL.md`
- `.claude/skills/taste-skill/SKILL.md`

Current project dials:
- `DESIGN_VARIANCE: 7` — expressive painted identity, but coherent
- `MOTION_INTENSITY: 3` — subtle response, especially around doors
- `VISUAL_DENSITY: 3` — room for artwork and readable content

These dials are implementation guidance, not permission to alter the approved palette/typography/logo system.

## 21st

Official MCP endpoint:
- `https://21st.dev/api/mcp`

Use cases:
- compare component directions;
- inspect interaction ideas;
- explore patterns.

Constraint:
**No automatic React/shadcn/Tailwind adoption.**

Production remains WordPress + Astra + child theme unless explicitly approved.

Setup:
- `docs/21ST-MCP.md`
