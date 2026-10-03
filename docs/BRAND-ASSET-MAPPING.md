# Brand Asset Mapping — Le Moulin de Laure

Status: **visually reverified 2026-10-03 after the Butterfly door was added**

The original eight production WebP files were opened together in `design/asset-contact-sheet.png`. The new Butterfly door was then inspected beside all three closed doors and the butterfly painting at native size. Paintings are approximately 1440 × 1440 px; doors are 512 × 768 px.

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

The fourth closed door now exists on `main` (`46ec2d4`): `door-butterfly-master.png` is a generated concept based on Laure's butterfly painting and the existing door series, with `door-butterfly.webp` as its 512 × 768 theme export. It is a brand derivative, not an original painting by Laure. Its WebP has an opaque dark surround whereas the three earlier door WebPs have transparency. V3 preserves that source export and uses `brand-derived/v3/door-butterfly-cutout.webp`, made by applying the Ocean door's matching alpha silhouette; the artwork pixels are otherwise unchanged. The original painting, master and exported WebP remain intact. `door-passage.webp` remains the common open transition and must never represent Air.

## V1 decision

The V1 decision below is historical. V3 uses all four closed doors as its central universe navigation, with Laure's four original paintings behind them. The hero still uses paintings, and the open Passage remains a separate shared transition.

The full-page Gutenberg patterns `lmdl/homepage-v1` and `lmdl/accompagnements-v1` implement this decision. Old structural `lmdl/four-universe-panels` remains as a legacy editor shell and should not be inserted for new V1 pages.
