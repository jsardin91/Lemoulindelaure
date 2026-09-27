# AI Project Instructions — Le Moulin de Laure

These are repository-level instructions for AI coding agents.

## Non-negotiable project gate

The client has supplied a JPEG logo, four paintings and a business-card reference. Formal brand guidelines have **not yet been supplied**. On 2026-09-27 the owner explicitly authorized a draft palette from the logo and a typography benchmark with UI/UX Pro Max.

Until they are added under `design/brand/` and summarized in `design-system/BRIEF.md`:

- treat the brand-derived colors and the benchmark-selected fonts as draft, not final client approval;
- do not lock a visual style;
- do not mark `design-system/MASTER.md` as active;
- do not begin a full homepage/page redesign.

Technical setup, content architecture, audits, inventory and tooling work are allowed.

## Source of truth and precedence

When instructions conflict, use this order:

1. Explicit user request in the current task
2. Client brand guidelines and approved client assets
3. Approved real production behavior/content
4. `design-system/MASTER.md` when its status is `active`
5. `design-system/pages/<page>.md` for approved page-specific exceptions
6. Existing reusable components/tokens/architecture
7. Project-local `frontend-design-pro`
8. UI/UX Pro Max
9. Taste Skill
10. 21st component/pattern references
11. Generic conventions and trends

Never let a generated palette, font pairing, component catalogue, trend, or AI aesthetic overwrite the approved brand.

## Required design workflow

For meaningful UI/UX/frontend work:

1. Read `docs/PROJECT.md`.
2. Read the available brand material in `design/brand/`.
3. Read `design-system/BRIEF.md` and `design-system/MASTER.md`.
4. Read `design-system/TOOLING.md`.
5. Use `frontend-design-pro` for overall design process and implementation discipline.
6. Use UI/UX Pro Max for research and UX/design-system evidence.
7. Use Taste Skill for anti-generic composition, typography, spacing and polish.
8. Use 21st MCP for component/pattern exploration when useful.
9. Translate references into the approved WordPress/Astra architecture.
10. Review visually, responsively and accessibly before considering work finished.

## Tool-specific rules

### UI/UX Pro Max

Expected project-local locations after its bootstrap is run:

- Codex: `.agents/skills/ui-ux-pro-max/`
- Claude Code: `.claude/skills/ui-ux-pro-max/`

It is advisory. Brand rules win.

### Taste Skill

Vendored project-local copies live at:

- Codex: `.agents/skills/taste-skill/SKILL.md`
- Claude Code: `.claude/skills/taste-skill/SKILL.md`

Do not blindly apply its defaults. Infer from the client brief and brand first. Project-specific dials belong in `design-system/TOOLING.md`.

### 21st

21st is an external MCP/CLI design resource. Setup is documented in `docs/21ST-MCP.md`.

This is a WordPress/Astra project. Do **not** add React, shadcn, Tailwind or a JS application layer just because a 21st reference uses those technologies. Use the design idea, not necessarily the implementation stack.

## WordPress architecture

- Never modify WordPress core.
- Never modify Astra parent-theme files.
- Custom theme work belongs in `wp-content/themes/lemoulindelaure-child/`.
- Custom Structured FAQ work belongs in `wp-content/plugins/structured-faq/`.
- Do not vendor Rank Math, Complianz, Forminator, Astra or LiteSpeed Cache into this repository.
- Preserve plugin-generated SEO/schema behavior unless a task explicitly changes it.
- Keep modifications upgrade-safe and rollbackable.

Detailed rules: `docs/WORDPRESS-WEB-DESIGN.md`.

## Production safety

- Never commit secrets, SSH keys, API keys, `wp-config.php`, database dumps or uploads.
- GitHub deployment remains disabled until the real WordPress document root is verified.
- Do not expose server paths or credentials in logs.
- Prefer small, auditable changes.
- Update `docs/HANDOFF.md` after meaningful project milestones.

## Design-system status

- `template`: no visual choices are approved.
- `draft`: proposed direction only.
- `active`: approved project source of truth.
- `deprecated`: historical only.

The current state is `draft` for the owner's explicitly requested identity work. Keep it `draft` until client validation.
