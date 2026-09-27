# Installation de UI UX Pro Max

UI UX Pro Max est un projet tiers MIT maintenu par NextLevelBuilder.

Source :
https://github.com/nextlevelbuilder/ui-ux-pro-max-skill

## Ce que l'installation ajoute

Pour Codex :

```text
.agents/skills/ui-ux-pro-max/
├── SKILL.md
├── data/
├── scripts/
└── ...
```

Pour Claude Code :

```text
.claude/skills/ui-ux-pro-max/
├── SKILL.md
├── data/
├── scripts/
└── ...
```

Le contenu exact dépend de la version courante du projet upstream.

## Installation automatique fournie par le pack

### Windows

```powershell
powershell -ExecutionPolicy Bypass -File .\scripts\setup-ui-ux-pro-max.ps1
```

### macOS / Linux / WSL / Git Bash

```bash
bash scripts/setup-ui-ux-pro-max.sh
```

## Installation manuelle équivalente

```bash
npm install -g ui-ux-pro-max-cli
uipro init --ai codex
uipro init --ai claude
```

Ou sans installation globale :

```bash
npx --yes ui-ux-pro-max-cli@latest init --ai codex
npx --yes ui-ux-pro-max-cli@latest init --ai claude
```

## Prérequis

- Node.js / npm / npx
- Python 3 pour le moteur de recherche UI UX Pro Max

Les scripts Python upstream utilisent la bibliothèque standard et sont conçus pour
effectuer leurs recherches localement dans les datasets du skill.

## Mise à jour

Relance simplement le script de setup.

Ensuite vérifie le diff Git avant de commit les changements générés par la nouvelle version.

## Rôle dans notre système

UI UX Pro Max est un **advisor**.

Il peut recommander :
- styles
- palettes
- typographies
- patterns de landing page
- UX
- accessibilité
- icons
- motion
- stacks

Mais la hiérarchie reste :

```text
demande utilisateur
> branding approuvé
> MASTER.md
> composants existants
> frontend-design-pro
> UI UX Pro Max
> tendances
```
