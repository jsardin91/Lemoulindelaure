from pathlib import Path
import shutil

root = Path(__file__).resolve().parent.parent
source = root / ".agents" / "skills" / "taste-skill" / "SKILL.md"
target = root / ".claude" / "skills" / "taste-skill" / "SKILL.md"

if not source.exists():
    raise SystemExit(f"Missing canonical Taste Skill: {source}")

target.parent.mkdir(parents=True, exist_ok=True)
shutil.copy2(source, target)
print(f"Synced {source.relative_to(root)} -> {target.relative_to(root)}")
