# AI Web Design System Pack — Final

This pack is designed to be committed into website repositories so AI coding agents
have persistent design and implementation guidance.

It targets:

- OpenAI Codex
- Claude Code
- WordPress and general web projects
- ChatGPT Work / Projects as a parallel planning/design environment

It combines:

1. **Project-level instructions**
2. **A project-local Frontend Design Pro skill**
3. **A persistent per-site design system**
4. **Optional full UI UX Pro Max integration**
5. **WordPress production rules**
6. **Responsive/accessibility/performance QA**
7. **A cross-agent hierarchy that prevents generic design tools from overwriting the brand**

## Important answer: does an AI follow this just because it is in GitHub?

### Codex

`AGENTS.md` is the repository-level instruction entry point for Codex.
The pack also includes a project-local skill under:

```text
.agents/skills/frontend-design-pro/
```

So you do **not** need a global installation of Frontend Design Pro for the repository
to carry its own workflow.

### Claude Code

`CLAUDE.md` is the repository-level project memory/instruction entry point for Claude Code.
It imports the shared `AGENTS.md` and points Claude to its project-local skill under:

```text
.claude/skills/frontend-design-pro/
```

### UI UX Pro Max

The full upstream UI UX Pro Max database/scripts are not duplicated in this ZIP because the
official project changes over time. Instead this pack includes a bootstrap script that installs
the current official full skill project-locally for both Codex and Claude Code.

After running the bootstrap once, the repository contains the actual UI UX Pro Max skill files,
scripts, and datasets in the native project directories.

Without the bootstrap:
- `AGENTS.md`, `CLAUDE.md`, Frontend Design Pro, design-system rules, WordPress rules and QA work.
- UI UX Pro Max's searchable database is not available.

With the bootstrap:
- the complete combined system is available.

## Repository structure

```text
your-site/
├── AGENTS.md
├── CLAUDE.md
├── .agents/
│   └── skills/
│       ├── frontend-design-pro/
│       │   └── SKILL.md
│       └── ui-ux-pro-max/              # created by bootstrap
├── .claude/
│   └── skills/
│       ├── frontend-design-pro/
│       │   └── SKILL.md
│       └── ui-ux-pro-max/              # created by bootstrap
├── design-system/
│   ├── BRIEF.md
│   ├── MASTER.md
│   ├── DECISIONS.md
│   └── pages/
│       └── _TEMPLATE.md
├── docs/
│   ├── AI-DESIGN-WORKFLOW.md
│   ├── WORDPRESS-WEB-DESIGN.md
│   ├── VISUAL-QA.md
│   ├── CHATGPT-WORK.md
│   ├── EXAMPLE-PROMPTS.md
│   └── UPSTREAM-SOURCES.md
├── scripts/
│   ├── setup-ui-ux-pro-max.sh
│   ├── setup-ui-ux-pro-max.ps1
│   ├── sync-frontend-design-skill.py
│   └── validate-ai-design-pack.py
└── licenses/
    └── UI-UX-PRO-MAX-MIT.txt
```

## First-time setup for a new repo

### 1. Copy this pack into the repository root

Commit the files.

### 2. Install UI UX Pro Max project-locally

macOS/Linux/WSL/Git Bash:

```bash
bash scripts/setup-ui-ux-pro-max.sh
```

Windows PowerShell:

```powershell
powershell -ExecutionPolicy Bypass -File .\scripts\setup-ui-ux-pro-max.ps1
```

The bootstrap uses the current official `ui-ux-pro-max-cli` package and creates the
Codex and Claude Code project-local skills.

Requirements:
- Node/npm/npx
- Python 3 for UI UX Pro Max's search engine

### 3. Fill the design brief

Edit:

```text
design-system/BRIEF.md
```

### 4. Build the design system

Edit:

```text
design-system/MASTER.md
```

Keep `status: draft` while choices are being developed.
Set `status: active` only after approval.

### 5. Keep page files sparse

Create page overrides only when a page genuinely differs from the Master:

```text
design-system/pages/homepage.md
design-system/pages/pricing.md
```

Use `_TEMPLATE.md`.

### 6. Validate the pack

```bash
python3 scripts/validate-ai-design-pack.py
```

## Existing website setup

Do not invent a new brand first.

Inventory:
- actual colors
- typography
- spacing
- components
- image treatment
- navigation
- breakpoints
- plugin/theme constraints
- existing good patterns

Then fill the Master in `EVOLVE` mode.

## Updating UI UX Pro Max

Re-run the setup script. It calls the latest official CLI package.

Review upstream changes before committing large generated differences.

## Keeping the duplicated custom skill in sync

Frontend Design Pro exists in both `.agents/` and `.claude/` for reliable
project-local discovery.

Edit the Codex copy as canonical:

```text
.agents/skills/frontend-design-pro/SKILL.md
```

Then run:

```bash
python3 scripts/sync-frontend-design-skill.py
```

## ChatGPT Work / Projects

Upload/copy:
- `docs/CHATGPT-WORK.md`
- the site's active `design-system/MASTER.md`
- optionally the brief and relevant page override

This gives Work the same decision hierarchy even though Work and Codex/Claude
do not share project memory automatically.

## Authority model

```text
User request
    ↓
Approved brand / real production behavior
    ↓
Active MASTER.md
    ↓
Page override
    ↓
Existing components
    ↓
Frontend Design Pro
    ↓
UI UX Pro Max
    ↓
Generic conventions / trends
```

This hierarchy is deliberate.

UI UX Pro Max is powerful design intelligence, but it must not overwrite an
approved brand with an industry preset.

## Recommended Git behavior

Commit:
- `AGENTS.md`
- `CLAUDE.md`
- `.agents/skills/`
- `.claude/skills/`
- `design-system/`
- `docs/`
- `scripts/`
- third-party license notices

This makes the design workflow travel with the repository.
