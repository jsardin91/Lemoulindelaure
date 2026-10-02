# Brand Asset Mapping — Le Moulin de Laure

Status: **visually verified 2026-10-02**

The eight production WebP files were opened together in `design/asset-contact-sheet.png` and inspected individually at their native dimensions. The paintings are approximately 1440 × 1440 px; doors are 512 × 768 px.

| Painting | Visible subject | Universe | Public service |
| --- | --- | --- | --- |
| `painting-squirrel.webp` | Squirrel on a branch, green ground | Terre | Communication animale |
| `painting-phoenix.webp` | Phoenix with multicolour wings, warm red/yellow ground | Feu | Accompagnement énergétique animalier |
| `painting-turtle.webp` | Turtle in blue water | Eau | Connexion avec les défunts |
| `painting-butterfly.webp` | Butterfly on a purple/blue sky | Air | Guidance pour soi |

| Door | What it actually depicts | Mapping |
| --- | --- | --- |
| `door-forest.webp` | Closed green door with squirrel | Terre / Écureuil |
| `door-phoenix.webp` | Closed red door with phoenix | Feu / Phénix |
| `door-ocean.webp` | Closed blue door with turtle | Eau / Tortue |
| `door-passage.webp` | **Open** shared passage toward a winding landscape, with no butterfly | No one universe; shared transition artwork |

**A fourth closed Air/Papillon door is missing.** The old `[lmdl_door]` shortcode uses `door-passage.webp` as its common open state, confirming that it cannot be treated as Air.

## V1 decision

Use the **four original paintings** as the principal, equal identity source for four universe panels. Give every painting the same architectural arch/threshold frame in CSS; vary image crop and content, not asset availability. Keep the three closed door artworks and the shared open passage for later editorial use, once a consistent four-door set or deliberate shared transition is approved. The hero uses paintings only. No fourth door is fabricated.

The full-page Gutenberg patterns `lmdl/homepage-v1` and `lmdl/accompagnements-v1` implement this decision. Old structural `lmdl/four-universe-panels` remains as a legacy editor shell and should not be inserted for new V1 pages.
