# Démarrage rapide — Pack AI Web Design

## Pour un nouveau site

1. Décompresse ce pack **à la racine du repo GitHub**.
2. Commit les fichiers.
3. Installe UI UX Pro Max dans le repo :

### Windows PowerShell

```powershell
powershell -ExecutionPolicy Bypass -File .\scripts\setup-ui-ux-pro-max.ps1
```

### macOS / Linux / WSL / Git Bash

```bash
bash scripts/setup-ui-ux-pro-max.sh
```

4. Remplis :

```text
design-system/BRIEF.md
```

5. Complète :

```text
design-system/MASTER.md
```

Passe son statut :

```yaml
status: template
```

à :

```yaml
status: draft
```

pendant la conception, puis :

```yaml
status: active
```

une fois le branding/design validé.

6. Vérifie l'installation :

```bash
python scripts/validate-ai-design-pack.py
```

## Pour Codex

Codex utilisera :

```text
AGENTS.md
.agents/skills/frontend-design-pro/
.agents/skills/ui-ux-pro-max/
design-system/
```

Tu n'as pas besoin d'installer `frontend-design-pro` globalement.

## Pour Claude Code

Claude Code utilisera :

```text
CLAUDE.md
.claude/skills/frontend-design-pro/
.claude/skills/ui-ux-pro-max/
design-system/
```

Tu n'as pas besoin d'installer `frontend-design-pro` globalement.

## Important

Le ZIP contient déjà toutes les règles maison.

UI UX Pro Max est installé via son CLI officiel afin de récupérer sa version complète et
actuelle : skill, moteur de recherche, datasets et scripts Python.

Sans lancer le bootstrap, le système reste fonctionnel avec Frontend Design Pro,
AGENTS.md, CLAUDE.md et le Design System, mais l'intelligence de recherche complète
de UI UX Pro Max n'est pas encore disponible.

## Pour un site existant

Ne commence pas par générer une nouvelle palette.

Utilise `EVOLVE` :

1. inspecte le vrai site
2. récupère les couleurs/fonts/composants existants
3. remplis le Master avec la réalité du site
4. conserve l'identité
5. améliore seulement ce qui est nécessaire
