#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT"

echo "== AI Web Design Pack: UI UX Pro Max setup =="

if ! command -v npx >/dev/null 2>&1; then
  echo "ERROR: npx was not found."
  echo "Install a current Node.js/npm distribution, then rerun this script."
  exit 1
fi

echo
echo "[1/3] Installing/updating UI UX Pro Max for Codex..."
npx --yes ui-ux-pro-max-cli@latest init --ai codex

echo
echo "[2/3] Installing/updating UI UX Pro Max for Claude Code..."
npx --yes ui-ux-pro-max-cli@latest init --ai claude

echo
echo "[3/3] Checking Python..."
if command -v python3 >/dev/null 2>&1; then
  python3 --version
elif command -v python >/dev/null 2>&1; then
  python --version
else
  echo "WARNING: Python 3 was not found."
  echo "UI UX Pro Max files are installed, but its search scripts require Python 3."
fi

echo
echo "Installed project-local paths should include:"
echo "  .agents/skills/ui-ux-pro-max/"
echo "  .claude/skills/ui-ux-pro-max/"
echo
echo "Run validation:"
echo "  python3 scripts/validate-ai-design-pack.py"
