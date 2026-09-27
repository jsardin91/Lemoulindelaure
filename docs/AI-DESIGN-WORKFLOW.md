# AI Design Workflow

## Authority

```text
Current user request
        ↓
Client brand guidelines + approved assets
        ↓
Approved production content/behavior
        ↓
design-system/MASTER.md (when active)
        ↓
page-specific approved override
        ↓
existing project components/architecture
        ↓
Frontend Design Pro
        ↓
UI/UX Pro Max
        ↓
Taste Skill
        ↓
21st references
        ↓
generic conventions/trends
```

## Tool roles

### Frontend Design Pro

Owns the overall design process, brand preservation, implementation discipline, responsive/accessibility/performance review, and WordPress constraints.

### UI/UX Pro Max

Use for structured design intelligence: style research, typography/palette candidates, UX guidelines, accessibility checks, patterns, motion and design-system exploration. It does not outrank the client brand.

### Taste Skill

Use to reduce generic AI-looking output and improve composition, spacing, typography, hierarchy, motion restraint and overall visual quality.

Its three dials must be project-specific, not blindly copied from a default. Record approved values in `design-system/TOOLING.md`.

### 21st MCP / CLI

Use for visual/component pattern discovery and comparison.

Because production is WordPress + Astra, a 21st React/shadcn implementation is normally a **reference**, not code to paste directly. Recreate useful behavior with semantic HTML, child-theme CSS/PHP and lightweight JS unless a stack change is explicitly approved.

## New-site workflow for this project

1. Receive and inspect brand guidelines.
2. Save/summarize source material in `design/brand/`.
3. Complete `design-system/BRIEF.md`.
4. Research only unresolved design decisions.
5. Use UI/UX Pro Max for structured options.
6. Use Taste Skill to challenge generic composition.
7. Use 21st for real component/pattern references where helpful.
8. Write a coherent visual thesis and tokens into `design-system/MASTER.md` with `status: draft`.
9. Produce wireframes/references in `design/`.
10. Get approval.
11. Switch Master to `active`.
12. Implement in the child theme.
13. Review responsive/accessibility/performance.
14. Record durable approved decisions in `design-system/DECISIONS.md`.

## Do not over-tool

The tools are complementary, not voting systems. Use the smallest amount of research needed to resolve a real design decision.
