# WordPress Implementation Plan V1 — Le Moulin de Laure

Status: **Homepage, Accompagnements hub, four service pages, editorial pages/articles and functional pages V1 implemented and verified in isolated WordPress; production content/build not started.**

Last updated: 2026-10-02

## Functional-page extension

`inc/functional-page-patterns.php` adds complete editable FAQ, Contact and Booking patterns and optional receipt patterns. Use **LMdL — Page V1** on the canonical pages. Forminator and Timetics remain the functional engines: patterns contain stable `[lmdl_contact_form]` and `[lmdl_booking]` core shortcode blocks. Configure the real Forminator form ID in `lmdl_forminator_contact_id`; configure Timetics with `lmdl_timetics_booking_mode=list` for a verified four-meeting list, or `lmdl_timetics_booking_id` for a verified single form. These are WordPress site options, never hardcoded local IDs. The child theme only supplies visual styles and a clear unconfigured fallback.

The local Timetics 1.0.64 fixture proved four TEST LOCAL meetings, a date/slot selection and native booking confirmation. No robust documented service preselection from detail pages was confirmed, so each detail page continues to the one canonical booking route. The booking route retains Timetics scripts; other pages keep the existing dequeue rule. Native Timetics confirmation is used; `/reservation-confirmee/` is prepared but not wired as a redirect. Forminator uses an inline success message; `/merci/` is prepared but not a mandatory redirect. Receipt pages and duplicate Timetics appointment URLs are crawlable noindex; both Rank Math hooks and a WordPress core sitemap fallback exclude them from sitemaps.

FAQ has four source questions in an editor-only note, with no public answers until Laure approves them. No FAQPage/QAPage schema is generated. Rank Math may own future FAQPage only if every answer is visible and approved; the source-only Structured FAQ plugin remains untouched. The isolated fixture cannot prove the configured Rank Math sitemap or Complianz banner. Detailed local results, plugin limitations and 21st visual references: `docs/FUNCTIONAL-PAGES-INTEGRATION-REPORT.md`. Required client inputs are consolidated in `docs/CLIENT-CONTENT-QUESTIONS.md`; follow `docs/STAGING-READINESS-CHECKLIST.md` before publishing any staging content. No production deployment is authorized by this milestone.

## Editorial-page extension

`inc/editorial-page-patterns.php` registers three full-page patterns at `init` priority 22: `lmdl/le-jardin-v1`, `lmdl/a-propos-v1` and `lmdl/journal-v1`. Insert each on its canonical page and select **LMdL — Page V1**. A separate `lmdl/jardin-profile-entry` is an editor draft hidden in public until a real participant consents and the `lmdl-pattern-placeholder` class is removed. The public Jardin pattern remains useful with no profiles. À propos uses the brand emblem pending a real Laure portrait and contains no unverified qualification wording.

Journal is a normal WordPress `post` system. Its saved native `core/query` displays six recent published posts, date descending, with the first as the visual lead; native pagination and no-results blocks handle both lifecycle states. The child `single.php` renders an article reading view and actual WordPress author. `functions.php` maps published post links and requests to `/journal/[slug]/`; **flush permalink rules once on staging after code installation** and check collision/canonical behavior with Rank Math. `assets/css/pages/editorial.css` loads for the three canonical page slugs and singular posts. Rank Math remains the schema/metadata owner; the isolated fixture did not emit Article JSON-LD, so staging configuration and validation are required. No fake articles, categories or client profiles belong in Git.

The full local integration and second-pass design report is `docs/EDITORIAL-PAGES-INTEGRATION-REPORT.md`. The current `feat/editorial-pages-v1` branch should be reviewed and merged separately. Production deployment remains out of scope.

## Service-page extension

Four detail patterns are registered from `inc/accompaniment-page-patterns.php` at `init` priority 21 after the shared page-pattern helpers: `lmdl/earth-accompaniment-v1`, `lmdl/fire-accompaniment-v1`, `lmdl/water-accompaniment-v1`, `lmdl/air-accompaniment-v1`. Insert the appropriate pattern into each child page under `/accompagnements/`, then select **LMdL — Page V1**. The four pages share `assets/css/pages/accompaniment-detail.css`; that stylesheet loads only for the four canonical slugs. Their hero paintings receive render-time dimensions and high fetch priority. Client-only TODO text appears as editor-styled paragraphs with `lmdl-pattern-placeholder` and is hidden on the frontend. Remove or replace those notes when confirmed content is supplied.

The pages were loaded only into the ignored local WordPress instance. Full 265-block Gutenberg validation, editing, responsive and second-pass visual results are in `docs/ACCOMPANIMENT-PAGES-INTEGRATION-REPORT.md`. Do not run the local fixture against production. The previous “Next safe step” below pertains to the completed foundation; that branch is now in `main`; client service details and staging integration remain pending.

## Implemented architecture

The active Astra child theme owns the approved tokens, fonts, artwork, section layouts and light interaction. Astra owns header, footer, navigation and normal page hooks. The native Gutenberg category is **Le Moulin de Laure**. The two complete V1 page patterns are `lmdl/homepage-v1` and `lmdl/accompagnements-v1`; older structural patterns (Split éditorial, Processus, Cadre responsable, CTA, Hero accompagnement, Hero accueil, Quatre univers) remain registered for compatibility.

To use either V1 pattern, insert it into a page and select the **LMdL — Page V1** page template in the Gutenberg sidebar. The template delegates to Astra `page.php`. The child theme keys `lmdl-page-v1` and the scoped full-width layout from that explicit editor setting, never from a string in page content. The authored pattern H1 replaces Astra's page title on those pages. Text and image blocks remain editable; no page content is embedded in the template PHP.

Pattern images are serialized as valid `core/image` markup. A targeted render filter supplies intrinsic dimensions to bundled source art and eager/high priority loading to the collage lead. Astra's navigation switches to its compact form below 1199 px so the desktop menu does not wrap. Add the CSS class `lmdl-nav-booking` to the **Prendre rendez-vous** Astra menu item in staging/production to get the approved button treatment; the class was assigned only in the disposable local menu for this test. Styles remain in `style.css`, shared `assets/css/components.css`, and page-family CSS; no Tailwind, custom React block or CSS build pipeline was added. Timetics' globally queued package bundle is dequeued only on the two V1 pages without a Timetics marker; a future booking embed on either page must be retested.

The real door audit is resolved in `docs/BRAND-ASSET-MAPPING.md`: three closed universe doors plus one shared open passage, with no closed Air door. The four paintings carry the V1 universe identity inside one common threshold frame. `Communication animale` and `/accompagnements/communication-animale/` are the public service label and URL.

## Integration proof

See `docs/WORDPRESS-INTEGRATION-REPORT.md` for environment, plugin versions, browser/editor findings, image and performance checks, accessibility, responsive results and limitations. In local WordPress 7.1.2 + Astra 4.14.0, all 171 blocks across the two pages validate, multiple Gutenberg edit/save/reload cycles pass, all local destination links return 200 and the 375/768/1024/1440 frontend views pass. The PHP lint and existing static preview tests also pass. The disposable local installation/database is ignored under `/.local-wp/`; no script here should be run against production.

## Earlier foundation handoff

The foundation and accompaniment code is already in `main`; review the editorial branch separately. On staging, create or update all actual pages with approved patterns/content, then repeat integration checks with configured Timetics, Forminator, Complianz and Rank Math. Keep production deployment as a separate decision.

## Content gates

- Client review and fact check of every provisional sentence before publication.
- Documentary wording for Laila Del Monte; never publish “certifiée par Laila Del Monte” by default.
- Exact service operations, prices, duration, FAQ and Journal content; no invented claims or medical/veterinary promises.
- Real booking rules and consent/legal copy; accurate Rank Math metadata and canonical checks on staging.
