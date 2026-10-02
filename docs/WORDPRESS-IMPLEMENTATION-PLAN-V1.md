# WordPress Implementation Plan V1 — Le Moulin de Laure

Status: **implementation architecture ready; production build not started**

Last updated: 2026-10-02

Prerequisites:
- approved brand system: `design-system/MASTER.md`
- V1 page wireframes under `design/wireframes/`
- SEO strategy: `docs/SEO-STRATEGY-V1.md`
- page metadata map: `docs/SEO-PAGE-MAP-V1.md`

## Objective

Implement the designed site in WordPress while keeping:
- content editable by Laure/the site owner;
- Astra upgrade-safe;
- brand code versioned in Git;
- page structure reproducible;
- third-party plugins in charge of their own behavior;
- performance/accessibility/SEO reviewable.

Do not hardcode all page copy into PHP templates.

---

# 1. Recommended production architecture

## WordPress owns

- page/post content;
- page hierarchy;
- navigation menus;
- Media Library;
- Journal posts;
- Forminator forms;
- Timetics booking content/configuration;
- Rank Math metadata/settings;
- Complianz consent/legal integration.

## Astra owns

- global header/footer framework;
- responsive navigation;
- standard WordPress wrappers;
- base theme integration.

## Child theme owns

- approved visual tokens;
- fonts;
- brand assets/door decoration;
- reusable section/component CSS;
- page-specific composition CSS where required;
- optional block patterns;
- very small presentation helpers;
- no business/booking/form logic duplicated from plugins.

## Plugins own

- Rank Math -> SEO metadata/canonical/sitemap/schema baseline
- Complianz -> cookies/privacy/consent
- Forminator -> contact form
- Timetics -> appointment booking/availability
- Structured FAQ -> FAQ behavior/schema only if still needed after schema-owner decision
- LiteSpeed Cache -> cache/performance layer

---

# 2. Page content implementation model

## Default: native Gutenberg content + project patterns

Use WordPress core blocks for:
- headings;
- paragraphs;
- images;
- groups;
- columns;
- buttons;
- lists;
- Query Loop where appropriate.

Use project custom classes/patterns for composition.

Benefits:
- content remains editable;
- no PHP template change for copy edits;
- source order remains semantic;
- responsive behavior can be controlled centrally;
- AI/Codex does not need to modify code for every text change.

## Avoid

- page builders added only for layout;
- Elementor/Divi/etc. unless explicitly approved later;
- hardcoded page copy in `page-*.php`;
- shortcode-only pages;
- HTML blobs that make normal editing impossible.

---

# 3. Block-pattern strategy

Recommended theme patterns/components:

- `lmdl/home-hero`
- `lmdl/editorial-statement`
- `lmdl/four-universe-gateways`
- `lmdl/founder-split`
- `lmdl/process-line`
- `lmdl/values-field`
- `lmdl/journal-teaser`
- `lmdl/faq-booking-close`
- `lmdl/accompaniment-hero`
- `lmdl/practical-info`
- `lmdl/responsible-boundary`
- `lmdl/related-accompaniments`
- `lmdl/profile-list`

Implementation options:
1. register patterns in PHP; or
2. use theme `patterns/` files if WordPress/Astra compatibility is verified on production.

Pattern text should remain replaceable in the editor.

Do not create a custom Gutenberg React block unless core blocks + CSS cannot satisfy the requirement.

---

# 4. CSS architecture

Current `style.css` contains:
- fonts;
- tokens;
- base typography;
- basic door prototype.

As the site grows, keep plain CSS with no Node/Tailwind build dependency.

Recommended split:

```text
assets/css/
  components.css
  pages/
    home.css
    accompagnements.css
    accompaniment-detail.css
    jardin.css
    about.css
    journal.css
    functional.css
```

Keep:
- theme header/tokens/base in `style.css`;
- reusable components in `components.css`;
- page composition styles conditionally enqueued by page/context.

Do not create dozens of tiny CSS files.

## Shared layout primitives

Create stable classes such as:
- `.lmdl-container`
- `.lmdl-section`
- `.lmdl-prose`
- `.lmdl-editorial-split`
- `.lmdl-art-frame`
- `.lmdl-cta-group`
- `.lmdl-process`
- `.lmdl-boundary`

Use CSS variables from the active Master.

---

# 5. Door/universe component

## Current shortcode assessment

Existing:
`[lmdl_door ...]`

It is a **prototype**, not the final Accompagnements implementation.

Limitations:
- single decorative link;
- fixed “passage” image used as open layer;
- no rich always-visible description;
- no four-panel coordinated expansion;
- door filename does not encode a verified service mapping for all universes.

## Final hub recommendation

Use semantic block markup for all four universes in one parent component:
- four real links;
- visible animal/element/service names;
- visible short intent;
- artwork/door layers decorative;
- desktop flex/grid focus expansion;
- tablet 2x2;
- mobile stacked.

Prefer CSS:
- `:hover`
- `:focus-within`
- flex/grid transitions

Avoid JavaScript unless CSS cannot safely produce the behavior.

Reduced-motion state must be complete.

## Asset mapping gate

Before coding final portal art:
visually verify which generated door asset belongs to:
- squirrel / earth
- phoenix / fire
- turtle / water
- butterfly / air

Do not infer mapping from filenames alone.

---

# 6. Brand imagery

## Content imagery

For prominent paintings used as content:
prefer optimized derivatives imported into WordPress Media Library so WordPress can provide:
- responsive sizes;
- `srcset`;
- alt text management;
- dimensions;
- image metadata.

Do not upload the raw high-resolution source masters if an optimized derivative is sufficient.

## Theme imagery

Keep decorative/reusable portal art in:
`assets/doors/`

Decorative images:
- empty alt;
- `aria-hidden` where appropriate.

Meaningful paintings:
- contextual alt text based on actual use.

---

# 7. Header / navigation

Use Astra Header Builder where possible.

Structure:
- horizontal logo;
- Accompagnements dropdown;
- Le Jardin;
- À propos;
- Journal;
- FAQ;
- Contact;
- dedicated **Prendre rendez-vous** CTA/button.

Prefer Astra's dedicated button component for the booking CTA over styling a random menu link, if it preserves the approved design.

Mobile:
- Astra menu;
- no custom JS navigation unless unavoidable.

---

# 8. Footer

Use Astra Footer Builder or a simple theme-compatible block/widget setup.

Groups:
- Découvrir
- Contact
- Informations

Keep:
- legal links;
- copyright/artwork wording once validated.

Avoid a second oversized sales hero in the footer.

---

# 9. Page hierarchy / WordPress records

Target pages:

```text
Accueil
Accompagnements
  Communication animale (SEO recommendation pending final approval)
  Accompagnement énergétique animalier
  Connexion avec les défunts
  Guidance pour soi
Le Jardin
À propos
Journal
FAQ
Contact
Prendre rendez-vous
Merci [noindex]
Réservation confirmée [noindex]
Réservation annulée [optional, noindex]
```

Do not create final records until the Communication animale naming/slug gate is resolved.

## Future bootstrap script

Recommended later:
an idempotent WP-CLI/`wp eval-file` script that can:
- create missing pages;
- preserve existing page IDs/content when rerun;
- set parent/slug;
- create/update menu structure;
- set static homepage;
- set custom post permalink if approved.

The script must support dry-run or clear logs before DB mutation.

Do not use a script to overwrite client-edited final copy after initial bootstrap.

---

# 10. Journal implementation

Recommended:
- normal WordPress posts;
- normal page at `/journal/` containing a Query Loop block;
- custom permalink structure or rewrite producing `/journal/%postname%/` after verification.

Why:
- Journal index remains editable;
- no need to make WordPress “Posts page” own a rigid archive template;
- featured/supporting layout can be built with Query Loop patterns.

Single articles:
use Astra/native single-post structure unless the final design requires a small child-theme override.

Style reading measure in CSS:
~60–75ch.

Do not hardcode article listings.

---

# 11. FAQ implementation

First decide schema owner.

Google FAQ rich results are no longer a reason to add FAQ schema.

Options:
1. visible accordion only + Rank Math generic page schema;
2. custom Structured FAQ output retained for semantic/non-Google reasons;
3. Rank Math FAQ feature, if used and non-duplicative.

Never emit duplicate FAQ schema.

Use semantic buttons/regions.

---

# 12. Contact implementation

Forminator owns:
- validation;
- submission;
- notifications;
- success/error state.

Theme owns only surrounding presentation.

Do not write a custom PHP mail form.

Form initially:
- Nom
- Email
- Message
- Sujet only if operationally useful.

---

# 13. Timetics implementation

Canonical page:
`/prendre-rendez-vous/`

Use Timetics embed/shortcode supplied by plugin.

Theme:
- introductory service-choice content;
- branded shell;
- layout around embed.

Timetics:
- services;
- duration;
- price;
- availability;
- groups;
- booking questions;
- cancellation/reschedule.

Do not recreate date picker/calendar behavior in theme code.

Confirmation:
redirect to branded noindex page if Timetics configuration supports it cleanly.

---

# 14. Rank Math / SEO setup

After final page copy:

Per page:
- Title
- meta description
- canonical
- robots
- schema choice

Global:
- sitemap
- breadcrumbs
- site/organization identity
- archives
- attachment behavior

At launch:
- tag/date/thin author archives disabled/noindex as planned;
- functional pages noindex;
- core pages self-canonical.

Do not try to optimize every plugin-generated URL.

---

# 15. Deployment model

Current GitHub Action:
`.github/workflows/install-child-theme.yml`

Important behavior:
- theme deployment is **manual** through `workflow_dispatch` unless the workflow file itself changes;
- ordinary theme commits on `main` do not auto-deploy;
- workflow packages the current child theme, uploads it, PHP-lints `functions.php`, swaps with rollback, activates and verifies.

This is suitable as a manual child-theme deploy pipeline during implementation.

It does **not** deploy WordPress database content/config.

Content/plugin configuration requires:
- WordPress admin; or
- separate explicitly-approved WP-CLI automation.

Keep theme deploy and DB mutation separate.

---

# 16. Implementation phases

## Phase A — foundation cleanup
- update child-theme README/status;
- create CSS organization;
- register/enqueue shared styles;
- verify Astra settings;
- verify responsive header/footer.

## Phase B — reusable patterns
- editorial split;
- process;
- values;
- boundary;
- CTA;
- related links.

## Phase C — homepage
- build home;
- visual QA;
- no live deployment until reviewed.

## Phase D — Accompagnements
- build four-panel component;
- then detail-page family.

## Phase E — trust/editorial
- Jardin;
- About;
- Journal.

## Phase F — functional
- FAQ;
- Contact;
- Timetics.

## Phase G — SEO/config
- Rank Math;
- sitemap;
- schema ownership;
- noindex/canonicals;
- redirects if slug decisions changed.

## Phase H — QA
- 375 / 768 / 1024 / 1440;
- keyboard;
- focus;
- reduced motion;
- contrast;
- forms;
- booking;
- image performance;
- cache;
- Search Console checks.

---

# 17. Pre-code gates

Resolve before production page creation:
1. Communication animale vs Communication animalière public label/slug;
2. exact Laila Del Monte credential;
3. exact energetic-service wording;
4. whether “guidance intuitive” is approved;
5. service durations/prices/process;
6. Timetics availability/cancellation rules.

Code/components can be prepared without inventing those values, but DB/page copy should wait.
