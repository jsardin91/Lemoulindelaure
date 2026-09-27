from pathlib import Path
import sys

root = Path(__file__).resolve().parent.parent

required = [
    "AGENTS.md",
    "CLAUDE.md",
    ".agents/skills/frontend-design-pro/SKILL.md",
    ".agents/skills/taste-skill/SKILL.md",
    ".claude/skills/frontend-design-pro/SKILL.md",
    ".claude/skills/taste-skill/SKILL.md",
    "design-system/BRIEF.md",
    "design-system/MASTER.md",
    "design-system/DECISIONS.md",
    "design-system/TOOLING.md",
    "design-system/pages/_TEMPLATE.md",
    "docs/PROJECT.md",
    "docs/AI-DESIGN-WORKFLOW.md",
    "docs/WORDPRESS-WEB-DESIGN.md",
    "docs/21ST-MCP.md",
    "docs/HANDOFF.md",
]

missing = [p for p in required if not (root / p).exists()]

print("Le Moulin de Laure project validation")
print("=" * 40)

if missing:
    print("Missing required files:")
    for p in missing:
        print(f"  - {p}")
else:
    print("Base project structure: OK")

for agent_dir, label in [
    (".agents/skills/ui-ux-pro-max/SKILL.md", "Codex UI/UX Pro Max"),
    (".claude/skills/ui-ux-pro-max/SKILL.md", "Claude UI/UX Pro Max"),
]:
    print(f"{label}: {'OK' if (root / agent_dir).exists() else 'NOT INSTALLED'}")

master = root / "design-system" / "MASTER.md"
if master.exists():
    text = master.read_text(encoding="utf-8", errors="replace")[:1200]
    if "status: active" in text:
        print("Design system status: active")
    elif "status: draft" in text:
        print("Design system status: draft")
    elif "status: template" in text:
        print("Design system status: template (expected until brand guidelines are approved)")
    else:
        print("Design system status: unknown")

if missing:
    sys.exit(1)
