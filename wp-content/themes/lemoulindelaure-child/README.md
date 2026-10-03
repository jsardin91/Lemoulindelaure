# Le Moulin de Laure Child Theme

Custom Astra child theme for **Le Moulin de Laure**.

## Status

The visual foundations are **approved and active as of 2026-10-02**.

Canonical design source:
- `design-system/MASTER.md`

Canonical implementation plan:
- `docs/WORDPRESS-IMPLEMENTATION-PLAN-V1.md`

Never modify Astra parent-theme files.

## Current responsibilities

The child theme currently provides:
- approved brand palette;
- Lora / Source Sans 3 local fonts;
- default logo/site-icon fallbacks;
- optimized client-art derivatives;
- four closed decorative universe doors and one shared open passage;
- reusable `[lmdl_portal]` opening interaction with visible HTML labels;
- basic accessibility/focus styling;
- a prototype `[lmdl_door]` shortcode.

The V1 public preview pages are now implemented; the door interaction is a reusable component and is not inserted into the published hub automatically.

## Assets

### Logo

- `assets/logo/logo-complet-creme.webp`
- `assets/logo/logo-complet-transparent.png`
- `assets/logo/logo-horizontal-transparent.png`
- `assets/logo/embleme-transparent.png`
- `assets/logo/signature-transparent.png`
- `assets/logo/devise-transparent.png`
- `assets/logo/icone-32.png`
- `assets/logo/icone-180.png`
- `assets/logo/icone-512.png`

WordPress Media Library selections take priority over theme fallbacks.

### Paintings

Optimized theme derivatives:
- `assets/art/painting-butterfly.webp`
- `assets/art/painting-phoenix.webp`
- `assets/art/painting-squirrel.webp`
- `assets/art/painting-turtle.webp`

For major content imagery, the implementation plan recommends importing optimized derivatives into the WordPress Media Library so responsive image sizes/alt text can be managed natively.

### Doors

- `assets/doors/door-forest.webp`
- `assets/doors/door-ocean.webp`
- `assets/doors/door-phoenix.webp`
- `assets/doors/door-butterfly.webp`
- `assets/doors/door-passage.webp` (shared open transition)

The four closed door mappings and paintings are documented in `docs/BRAND-ASSET-MAPPING.md` and the reusable interaction in `docs/DOOR-PORTAL-COMPONENT.md`.

## Palette

Approved tokens:

- Moulin blue: `#165A77`
- Teal: `#306C67`
- Ink: `#173F54`
- Cream: `#FAF7EF`
- Paper: `#FFFDF8`
- Line: `#DCD4BD`
- Lavender: `#666294`
- Antique gold: `#B68631`
- Leaf green: `#426F47`

See:
- `style.css`
- `theme.json`
- `design-system/MASTER.md`

## Typography

Approved:
- Lora 600 for headings
- Source Sans 3 400 for body
- Source Sans 3 600 for controls/emphasis

Fonts are self-hosted under `assets/fonts/`.

## Astra activation behavior

On first activation, `functions.php` seeds:
- Astra's nine native global palette slots;
- Source Sans 3 body;
- Lora headings.

The defaults are installed once using:
`lmdl_brand_defaults_installed`

Later client edits in Astra are preserved.

## Door shortcode

Reusable animated version: `[lmdl_portal href="/accompagnements/guidance-pour-soi/" label="Guidance pour soi" art="butterfly"]`. Supported arts: `forest`, `phoenix`, `ocean`, `butterfly`. It reveals the matching painting; keyboard, touch, reduced motion and native links are documented in `docs/DOOR-PORTAL-COMPONENT.md`.

Legacy prototype usage:

`[lmdl_door href="/service/" label="Nom du service" art="ocean"]`

This shortcode is **not** the planned final four-universe hub component.

Keep it only as a prototype/simple decorative link unless the final implementation plan explicitly reuses it.

The final Accompagnements hub needs:
- four coordinated panels;
- always-visible text;
- richer responsive behavior;
- focus/keyboard equivalence;
- reduced-motion fallback.

See:
- `design/wireframes/ACCOMPAGNEMENTS-V1.md`
- `docs/WORDPRESS-IMPLEMENTATION-PLAN-V1.md`

## Asset rebuilding

Original client files and generated masters are under:
`design/brand/`

Rebuild derivatives with:
`python scripts/build-brand-assets.py`

after installing Pillow.

## Deployment

Theme deployment is manual through:
`.github/workflows/install-child-theme.yml`

The workflow:
- packages the current child theme;
- uploads via SSH;
- PHP-lints `functions.php`;
- swaps with rollback;
- activates/verifies the child theme.

Normal commits to theme files do not automatically deploy to production.

WordPress content/database/plugin configuration is separate from theme deployment.
