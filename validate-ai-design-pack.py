from pathlib import Path
import sys

root = Path(__file__).resolve().parent.parent

required = [
    "AGENTS.md",
    "CLAUDE.md",
    ".agents/skills/frontend-design-pro/SKILL.md",
    ".claude/skills/frontend-design-pro/SKILL.md",
    "design-system/BRIEF.md",
    "design-system/MASTER.md",
    "design-system/DECISIONS.md",
    "design-system/pages/_TEMPLATE.md",
    "docs/AI-DESIGN-WORKFLOW.md",
    "docs/WORDPRESS-WEB-DESIGN.md",
    "docs/VISUAL-QA.md",
    "docs/CHATGPT-WORK.md",
]

missing = [p for p in required if not (root / p).exists()]

codex_uipro = root / ".agents" / "skills" / "ui-ux-pro-max" / "SKILL.md"
claude_uipro = root / ".claude" / "skills" / "ui-ux-pro-max" / "SKILL.md"

print("AI Web Design Pack validation")
print("=" * 36)

if missing:
    print("Missing required base files:")
    for p in missing:
        print(f"  - {p}")
else:
    print("Base pack: OK")

print(f"Codex UI UX Pro Max: {'OK' if codex_uipro.exists() else 'NOT INSTALLED'}")
print(f"Claude UI UX Pro Max: {'OK' if claude_uipro.exists() else 'NOT INSTALLED'}")

master = root / "design-system" / "MASTER.md"
if master.exists():
    text = master.read_text(encoding="utf-8", errors="replace")[:1000]
    if "status: active" in text:
        print("Design system status: active")
    elif "status: draft" in text:
        print("Design system status: draft")
    elif "status: template" in text:
        print("Design system status: template (fill before treating it as approved brand authority)")
    else:
        print("Design system status: unknown")

if missing:
    sys.exit(1)

if not codex_uipro.exists() or not claude_uipro.exists():
    print()
    print("To install the full UI UX Pro Max engine:")
    print("  macOS/Linux: bash scripts/setup-ui-ux-pro-max.sh")
    print(r"  Windows: powershell -ExecutionPolicy Bypass -File .\scripts\setup-ui-ux-pro-max.ps1")
