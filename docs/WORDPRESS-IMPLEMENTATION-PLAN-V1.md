# WordPress Implementation Plan V1 — Le Moulin de Laure

Status: **Homepage + Accompagnements foundation implemented and verified in isolated WordPress; production content/build not started.**

Last updated: 2026-10-02

## Implemented architecture

The active Astra child theme owns the approved tokens, fonts, artwork, section layouts and light interaction. Astra owns header, footer, navigation and normal page hooks. The native Gutenberg category is **Le Moulin de Laure**. The two complete V1 page patterns are `lmdl/homepage-v1` and `lmdl/accompagnements-v1`; older structural patterns (Split éditorial, Processus, Cadre responsable, CTA, Hero accompagnement, Hero accueil, Quatre univers) remain registered for compatibility.

To use either V1 pattern, insert it into a page and select the **LMdL — Page V1** page template in the Gutenberg sidebar. The template delegates to Astra `page.php`. The child theme keys `lmdl-page-v1` and the scoped full-width layout from that explicit editor setting, never from a string in page content. The authored pattern H1 replaces Astra's page title on those pages. Text and image blocks remain editable; no page content is embedded in the template PHP.

Pattern images are serialized as valid `core/image` markup. A targeted render filter supplies intrinsic dimensions to bundled source art and eager/high priority loading to the collage lead. Astra's navigation switches to its compact form below 1199 px so the desktop menu does not wrap. Add the CSS class `lmdl-nav-booking` to the **Prendre rendez-vous** Astra menu item in staging/production to get the approved button treatment; the class was assigned only in the disposable local menu for this test. Styles remain in `style.css`, shared `assets/css/components.css`, and page-family CSS; no Tailwind, custom React block or CSS build pipeline was added. Timetics' globally queued package bundle is dequeued only on the two V1 pages without a Timetics marker; a future booking embed on either page must be retested.

The real door audit is resolved in `docs/BRAND-ASSET-MAPPING.md`: three closed universe doors plus one shared open passage, with no closed Air door. The four paintings carry the V1 universe identity inside one common threshold frame. `Communication animale` and `/accompagnements/communication-animale/` are the public service label and URL.

## Integration proof

See `docs/WORDPRESS-INTEGRATION-REPORT.md` for environment, plugin versions, browser/editor findings, image and performance checks, accessibility, responsive results and limitations. In local WordPress 7.1.2 + Astra 4.14.0, all 171 blocks across the two pages validate, multiple Gutenberg edit/save/reload cycles pass, all local destination links return 200 and the 375/768/1024/1440 frontend views pass. The PHP lint and existing static preview tests also pass. The disposable local installation/database is ignored under `/.local-wp/`; no script here should be run against production.

## Next safe step

Review and merge the code branch only. In a separate staging phase, create the two actual pages, insert the V1 patterns, select their template, and repeat the integration check with configured Timetics, Forminator, Complianz and Rank Math. Keep production deployment as a separate authorized decision.

## Content gates

- Client review and fact check of every provisional sentence before publication.
- Documentary wording for Laila Del Monte; never publish “certifiée par Laila Del Monte” by default.
- Exact service operations, prices, duration, FAQ and Journal content; no invented claims or medical/veterinary promises.
- Real booking rules and consent/legal copy; accurate Rank Math metadata and canonical checks on staging.
