# V3 addendum — implementation and verification

2026-10-03, branch `redesign/editorial-portals-v3`.

## Theme

- The V3 public copy in `inc/v3/content.php` and the nine art-directed partials now speaks as Laure (`je → vous`). Asset provenance has been removed from visible captions, image descriptions and alt text; internal asset documentation remains authoritative. The four portal doors, including the butterfly door, are retained.
- `header-v3.php` includes all six main destinations and a separate booking link. The Accompagnements submenu opens on hover and `:focus-within` without JavaScript. The compact `<details>` menu includes the four services and all top-level destinations. The booking CTA uses one border and no text decoration.
- `footer-v3.php` is a closing editorial spread with a brand logo, motto, booking link, top-level navigation and four universe links. Legal links are omitted because their routes have not been verified.
- FAQ, Contact and Booking use V3 partials; Contact and Booking retain the existing `[lmdl_contact_form]` / `[lmdl_booking]` wrappers. Plugin markup remains native. The FAQ has no fabricated answers. `assets/v3/v3-extension.css` loads after the base V3 sheet for the header, footer and scoped plugin presentation.
- No Astra parent file or new frontend dependency was changed.

## Local plugin configuration

`scripts/configure-preview-v3.php` is idempotent and guarded by active child theme and `lmdl_preview_noindex=1`. It synchronizes Astra's nine global palette slots and explicit text, heading, link, button and background options. It creates a three-field Forminator form with email notifications disabled and persistent WordPress submissions. It creates four native Timetics entries titled **Prévisualisation — [service]** with expired availability and no staff. The 15-minute value is a technical placeholder required by Timetics and hidden from the preview list; it is not a service duration. No slot should be bookable. The script keeps the plugin's own calendar UI and must not be used as commercial configuration.

The local run produced Forminator ID 275 and Timetics IDs 276–279. These are disposable local IDs; none are committed as site IDs. Existing local `TEST LOCAL` appointments remain in the ignored fixture. The frontend list shows the four newest preview entries. The native booking control did not open a modal in the guarded local preview, so calendar internals could not be inspected without making a slot available. This is the plugin preview limitation and the safe choice for a public page.

## Visual and technical QA

- First pass found a 72 px mobile overflow on Contact caused by the long closing CTA heading. It was shortened; second pass covered 12 routes at 375, 768, 1024 and 1440 px, with one H1, no overflow and no broken loaded image. The contact form was visually inspected at 375 px; labels, fields, textarea and submit control are spaced and legible.
- Local computed styles at all four widths: body and H1 `rgb(23,63,84)` (`#173F54`), body background `rgb(250,247,239)` (`#FAF7EF`), header link and CTA `rgb(23,63,84)`, footer background `rgb(23,63,84)`. CTA `text-decoration-line: none`, one border. The visible desktop nav has six destinations.
- The newly configured local Forminator form was retested: empty submit showed three errors and focused the first field; invalid email showed its error; correction showed the inline French success message. Timetics preview list renders four meetings locally. Clicking its booking button did not open a modal or expose an enabled day or slot. The headless browser reports a denied third-party resource on Booking, consistent with the documented local Stripe request; no theme JS exception was seen.
- An automated scan of the rendered HTML for all 12 public routes found no remaining third-person Laure narration or brand-asset explanation. The first scan found FAQ text stored in Gutenberg and a Journal thumbnail alt; V3 FAQ and semantic thumbnail alt corrected both.
- PHP lint passed for child theme files and the configuration script. No tests were added that merely mirror implementation.

## Deployment sequence and gate

1. Push this branch, run `preview-audit-backup.yml` and retain its `BACKUP_READY` ID. The backup stays in the SSH account's private directory outside the web root; it contains a compressed DB export and child theme archive. The workflow no longer copies `wp-config.php`.
2. Run `preview-deploy-theme.yml` with that backup ID. It verifies the backup, PHP syntax and noindex guard, and rolls back the theme on failure.
3. Run `preview-configure-v3.yml` with the same backup ID. It verifies the snapshot and guard before running the idempotent plugin/Astra script, then purges LiteSpeed.
4. Repeat visual, plugin, color and noindex checks on the public domain. Do not infer success from local QA.

The automatic approval reviewer initially rejected the existing backup workflow because it copied the sensitive `wp-config.php` into a private remote backup. That copy was removed. If it still rejects the revised backup, do not deploy or mutate the live DB; seek explicit approval for that action.

## Client content still needed

Real booking duration, prices, availability, cancellation terms, notification destination and legal/privacy pages remain unconfirmed. The preview must not be treated as an active booking launch. FAQ answers and partner facts remain omitted until sourced.
