# Brand Asset Mapping — Le Moulin de Laure

Status: **source paintings mapped; door system partially unresolved**

Last updated: 2026-10-02

## Original paintings — verified mapping

| Asset | Universe | Accompaniment |
| --- | --- | --- |
| `painting-squirrel.webp` | Écureuil · Terre · Vivant | Communication animale / animalière |
| `painting-phoenix.webp` | Phénix · Feu · Énergie | Accompagnement énergétique animalier |
| `painting-turtle.webp` | Tortue · Eau · Famille | Connexion avec les défunts |
| `painting-butterfly.webp` | Papillon · Air · Messager | Guidance pour soi |

Theme location:
`wp-content/themes/lemoulindelaure-child/assets/art/`

## Door assets — current code behavior

Current theme assets:
- `door-forest.webp`
- `door-ocean.webp`
- `door-phoenix.webp`
- `door-passage.webp`

The legacy `[lmdl_door]` shortcode treats:
- forest / ocean / phoenix as selectable closed-art values;
- **passage as the common open overlay**, regardless of which closed art was selected.

Therefore:

**Do not map `door-passage.webp` to Papillon/Air by default.**

The repository does not yet prove that there is a dedicated fourth closed door for the Air/Papillon universe.

## Working hypotheses — visual verification still required

Filename semantics suggest:
- forest -> Terre / Écureuil;
- ocean -> Eau / Tortue;
- phoenix -> Feu / Phénix.

These remain hypotheses until the WebP files are visually checked.

Air / Papillon remains unresolved.

## Implementation options after visual verification

1. Confirm/create a dedicated Air door.
2. Intentionally use a different Air treatment.
3. Use the four original paintings as universe media and a shared door/frame motif as decoration.

## Rule for agents

Before wiring final universe media:
1. open all four WebP door assets locally;
2. compare them visually;
3. record the confirmed mapping here;
4. only then bind exact files in the Four Universes pattern.

Do not infer final mapping from filenames alone.

## Current Gutenberg pattern

`lmdl/four-universe-panels` deliberately contains media placeholders instead of hardcoded door files until this decision is closed.
