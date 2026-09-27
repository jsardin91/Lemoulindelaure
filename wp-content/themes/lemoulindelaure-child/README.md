# Le Moulin de Laure Child Theme

Custom Astra child theme. Activate Astra first, then this child theme in WordPress.

## Assets

- `assets/logo/logo-complet-creme.webp`: faithful logo on its original cream ground, recommended default for the site logo.
- `assets/logo/logo-complet-transparent.png`: isolated lockup for a matching light background; transparency is approximate because the supplied source is JPEG.
- `assets/logo/embleme-transparent.png`: emblem for compact headers or accents.
- `assets/logo/logo-horizontal-transparent.png`: emblem plus original client lettering, recommended for a wide header.
- `assets/logo/signature-transparent.png`: client lettering only, for wide headers.
- `assets/logo/devise-transparent.png`: optional tagline, not a substitute for HTML copy.
- `assets/logo/icone-32.png`, `icone-180.png`, `icone-512.png`: favicon and app icons. The WordPress Site Icon can use the 512 px file.
- `assets/art/painting-*.webp`: optimized versions of the four original paintings.
- `assets/doors/door-*.webp`: optimized decorative portals. `passage` is open; `ocean`, `forest` and `phoenix` are closed illustrations. These are distinct images, not frames of an opening animation.

Original client files and generated masters are in `design/brand/`. Rebuild derivatives with `python scripts/build-brand-assets.py` after installing Pillow. The palette is recorded in CSS custom properties and the editor palette in `theme.json`. Astra's global color variables are also given fallback values in `style.css`; check Astra Customizer settings on the installed site because saved customizer colors may override CSS declarations.

Use the `[lmdl_door href="/service/" label="Nom du service" art="ocean"]` shortcode for a decorative link. Valid art values: `ocean`, `forest`, `phoenix`, `passage`. The shortcode returns nothing until both a real URL and label are supplied. Keep an actual service heading, explanatory paragraph and HTML link on the page; avoid inventing service names from the paintings. On mobile, keyboard or reduced-motion settings, navigation remains a regular link.

The brand palette and illustrations are a **draft** inferred from the supplied images, pending formal guidelines and client approval. Typography is undecided.

Do not implement final visual styling until the brand guidelines and `design-system/MASTER.md` are approved.

Never modify Astra parent-theme files.
