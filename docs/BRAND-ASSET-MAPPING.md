# Brand Asset Mapping — Le Moulin de Laure

Status: **visually verified 2026-10-02**

The original eight production WebP files were inspected together in `design/asset-contact-sheet.png`. A fifth WebP, the closed Butterfly door, was added on 2026-10-03 and inspected against the painting and the existing door series. The paintings are approximately 1440 × 1440 px; doors are 512 × 768 px.

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
| `door-butterfly.webp` | Closed violet-blue door with butterfly | Air / Papillon |
| `door-passage.webp` | **Open** shared passage toward a winding landscape, with no butterfly | No one universe; shared transition artwork |

The fourth closed Air/Papillon door now exists. `door-passage.webp` remains a shared open state. `door-butterfly-master.png` is an AI-generated concept based on the client's butterfly painting and the three existing closed doors; the original painting is preserved.

## V1 decision

Use the **four original paintings** as the principal, equal identity source for four universe panels. Give every painting the same architectural arch/threshold frame in CSS; vary image crop and content, not asset availability. The four closed doors and their matching paintings can now support a reusable opening interaction, documented in `DOOR-PORTAL-COMPONENT.md`. The currently published hub and hero continue to use the paintings until their composition is deliberately revised.

The full-page Gutenberg patterns `lmdl/homepage-v1` and `lmdl/accompagnements-v1` implement this decision. Old structural `lmdl/four-universe-panels` remains as a legacy editor shell and should not be inserted for new V1 pages.
