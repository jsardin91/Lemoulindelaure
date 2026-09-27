from pathlib import Path
import shutil

root = Path(__file__).resolve().parent.parent
src = root / ".agents" / "skills" / "frontend-design-pro" / "SKILL.md"
dst = root / ".claude" / "skills" / "frontend-design-pro" / "SKILL.md"

if not src.exists():
    raise SystemExit(f"Missing canonical skill: {src}")

dst.parent.mkdir(parents=True, exist_ok=True)
shutil.copy2(src, dst)
print(f"Synced {src.relative_to(root)} -> {dst.relative_to(root)}")
