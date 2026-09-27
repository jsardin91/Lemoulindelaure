$ErrorActionPreference = "Stop"

$Root = Split-Path -Parent $PSScriptRoot
Set-Location $Root

Write-Host "== AI Web Design Pack: UI UX Pro Max setup =="

if (-not (Get-Command npx -ErrorAction SilentlyContinue)) {
    Write-Error "npx was not found. Install a current Node.js/npm distribution and rerun this script."
    exit 1
}

Write-Host ""
Write-Host "[1/3] Installing/updating UI UX Pro Max for Codex..."
& npx --yes ui-ux-pro-max-cli@latest init --ai codex
if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }

Write-Host ""
Write-Host "[2/3] Installing/updating UI UX Pro Max for Claude Code..."
& npx --yes ui-ux-pro-max-cli@latest init --ai claude
if ($LASTEXITCODE -ne 0) { exit $LASTEXITCODE }

Write-Host ""
Write-Host "[3/3] Checking Python..."
if (Get-Command python -ErrorAction SilentlyContinue) {
    & python --version
} elseif (Get-Command py -ErrorAction SilentlyContinue) {
    & py -3 --version
} else {
    Write-Warning "Python 3 was not found. UI UX Pro Max is installed, but its search scripts require Python 3."
}

Write-Host ""
Write-Host "Installed project-local paths should include:"
Write-Host "  .agents/skills/ui-ux-pro-max/"
Write-Host "  .claude/skills/ui-ux-pro-max/"
Write-Host ""
Write-Host "Validate with:"
Write-Host "  python scripts/validate-ai-design-pack.py"
