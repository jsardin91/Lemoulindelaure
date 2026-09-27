# Pourquoi ce pack fonctionne dans un repository

## Codex

Codex utilise `AGENTS.md` comme documentation/instructions de projet.

Le fichier se trouve à la racine du repo afin que les règles communes soient présentes
dans les tâches Codex exécutées dans ce projet.

Le pack contient également le skill projet :

```text
.agents/skills/frontend-design-pro/SKILL.md
```

Un skill projet n'a pas besoin d'être installé globalement pour voyager avec le repo.

Après bootstrap, UI UX Pro Max est également présent sous :

```text
.agents/skills/ui-ux-pro-max/
```

## Claude Code

Claude Code charge les instructions projet depuis `CLAUDE.md`.

Ici `CLAUDE.md` importe `AGENTS.md`, ce qui évite de maintenir deux systèmes de règles
contradictoires.

Le pack fournit aussi :

```text
.claude/skills/frontend-design-pro/SKILL.md
```

et le bootstrap ajoute :

```text
.claude/skills/ui-ux-pro-max/
```

## GitHub seul n'exécute rien

Le fait qu'un fichier soit dans GitHub ne force pas n'importe quel modèle ou bot au monde
à le lire.

Ce pack fonctionne quand l'agent utilisé connaît les conventions correspondantes :

- Codex → `AGENTS.md` + Agent Skills
- Claude Code → `CLAUDE.md` + project skills

Un agent générique qui ignore ces conventions peut toujours lire les fichiers si on le lui
demande, mais la découverte automatique n'est pas garantie.

## Pourquoi garder les skills dans le repo

Avantages :

- mêmes règles sur tous les PC
- mêmes règles pour tous les contributeurs
- versionnées avec le code
- révision possible dans les pull requests
- pas de dépendance à une configuration personnelle cachée
- un ancien commit conserve les règles qui existaient à ce moment-là

## Pourquoi UI UX Pro Max est bootstrapé

UI UX Pro Max évolue rapidement.

Le copier manuellement dans un template figerait :

- son SKILL.md
- ses palettes
- ses données de typographie
- ses règles UX
- ses scripts de recherche
- ses recommandations de stacks

Le script de bootstrap utilise le package officiel actuel :

```text
ui-ux-pro-max-cli
```

et génère les dossiers natifs pour Codex et Claude Code.

Ainsi le template maison reste stable et UI UX Pro Max peut être mis à jour séparément.
