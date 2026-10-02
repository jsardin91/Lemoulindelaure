# Handoff / Project State

Last updated: 2026-10-02

## Current state

The project now has:
- active approved brand system;
- V1 site architecture;
- V1 UX for all public pages;
- V1 SEO research/strategy/page map;
- WordPress implementation plan;
- **non-content-specific theme CSS foundation committed**.

No production deployment/page DB mutation occurred in this pass.

## New implementation files

- `wp-content/themes/lemoulindelaure-child/assets/css/components.css`
- `wp-content/themes/lemoulindelaure-child/assets/css/pages/home.css`
- `wp-content/themes/lemoulindelaure-child/assets/css/pages/accompagnements.css`
- `wp-content/themes/lemoulindelaure-child/assets/css/pages/accompaniment-detail.css`
- `wp-content/themes/lemoulindelaure-child/assets/css/pages/editorial.css`
- `wp-content/themes/lemoulindelaure-child/assets/css/pages/functional.css`

`functions.php` now conditionally enqueues these styles by page family.

## Important

The four-panel Accompagnements CSS is only a structural shell.
The final pattern/markup still needs:
- real service text;
- verified door-to-universe asset mapping;
- painting layers;
- keyboard QA;
- real-device responsive QA.

The legacy `[lmdl_door]` shortcode is not the final hub.

## Next safe implementation task

Register reusable Gutenberg patterns using the CSS foundation.

## No deploy

Current workflow is manual. No `workflow_dispatch` was run.

## Gates remain

- Communication animale public label/slug;
- exact Laila credential;
- energetic/guidance wording;
- service logistics/pricing;
- Timetics settings.
