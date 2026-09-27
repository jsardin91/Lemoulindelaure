# AI Design Workflow

This document explains how agents should combine project instructions, the custom
Frontend Design Pro skill, the site design system, and UI UX Pro Max.

## Architecture

```text
Current user request
        ↓
Existing approved brand / production site
        ↓
design-system/MASTER.md (if active)
        ↓
page-specific override
        ↓
existing components + code architecture
        ↓
frontend-design-pro
        ↓
UI UX Pro Max research/recommendations
        ↓
generic conventions / trends
```

## Why two design skills?

### Frontend Design Pro

Owns the process:
- art direction
- brand preservation
- anti-generic design
- EVOLVE vs REDESIGN
- implementation discipline
- WordPress constraints
- responsive/accessibility/performance
- visual review and self-critique

### UI UX Pro Max

Provides a searchable design-intelligence database:
- product/category reasoning
- UI styles
- palettes
- typography
- landing-page patterns
- UX guidelines
- icons
- charts
- motion
- stack-specific guidance

It is a research and recommendation layer, not the brand authority.

## Existing site workflow

1. Inspect the actual page and code.
2. Read active Master and page override.
3. Determine the smallest scope.
4. Use EVOLVE unless redesign is explicit.
5. Query UI UX Pro Max only where it adds useful evidence/options.
6. Define visual thesis and hierarchy.
7. Implement in existing architecture.
8. Render/review.
9. Fix weakest visual decision.
10. Validate responsive/accessibility/performance.
11. Record only durable approved decisions.

## New site workflow

1. Fill `design-system/BRIEF.md`.
2. Research relevant patterns.
3. Use UI UX Pro Max to explore options, not blindly choose them.
4. Propose a coherent visual thesis.
5. Establish palette/type/layout/component rules.
6. Put proposed rules in `MASTER.md` with status `draft`.
7. Build representative page/section.
8. Review visually.
9. Refine.
10. Change Master status to `active` only after approval.

## UI UX Pro Max search examples

Paths depend on the agent.

Codex example:

```bash
python3 .agents/skills/ui-ux-pro-max/scripts/search.py "premium consulting agency trust authority" --design-system -f markdown
```

Claude Code example:

```bash
python3 .claude/skills/ui-ux-pro-max/scripts/search.py "premium consulting agency trust authority" --design-system -f markdown
```

Domain search:

```bash
python3 <skill-path>/scripts/search.py "editorial minimal premium" --domain style
python3 <skill-path>/scripts/search.py "serif editorial restrained" --domain typography
python3 <skill-path>/scripts/search.py "accessible form errors" --domain ux
```

Treat generated colors/fonts as candidates unless no approved brand exists.

## Do not over-query

Design intelligence is useful, but repeated searches should not replace judgment.

Use the smallest number of searches needed to resolve a real design decision.
