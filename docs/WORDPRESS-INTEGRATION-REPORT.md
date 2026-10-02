# Local WordPress integration — Homepage V1 and Accompagnements

Date: 2026-10-02. Scope: `feat/home-accompagnements-v1` only. **No production DB, page, workflow, Astra parent file or deployment was touched.**

## Isolated environment

- WordPress 7.1.2, PHP 8.5.8, Astra 4.14.0, active `lemoulindelaure-child`.
- SQLite Database Integration 3.0.2 supplies the local `db.php` drop-in. The built-in PHP server is bound to `127.0.0.1:8765` only. All files, database and local credentials live in ignored `/.local-wp/`.
- The two full-page patterns were inserted into local published test pages (not public internet pages): Homepage ID 4 is the static front page, hub ID 5 has `/accompagnements/`. Ten minimal local destination pages were added solely to test routes. Both V1 pages select the editor template **LMdL — Page V1**.
- Rank Math 1.0.279, Forminator 1.57.3, Timetics 1.0.64, Complianz 7.5.5 and LiteSpeed Cache 7.9.1 were installed and activated locally. No service account, booking, form, legal text, cache server integration or SEO metadata was fabricated.

## Gutenberg and Astra findings

The first real Gutenberg parse flagged all 14 `core/image` blocks as invalid: serialized `width`, `height`, `loading` and `decoding` attributes did not match Gutenberg's save output. The pattern image markup now matches core/image exactly. A narrow `render_block` filter adds intrinsic dimensions to known bundled art at render time and gives only the collage lead `fetchpriority="high"`. The source paintings remain editable or replaceable in Gutenberg.

After the fix, **104/104 Homepage blocks and 67/67 hub blocks were valid** with no recovery prompt. On each page, two independent paragraph edit/save/reload cycles passed. Title edits, image URL replacement and a top-level section move also persisted through save/reload; all were restored in the disposable local DB. The custom classes survived. The editor shows the art, colors and layout in a usable approximation of the frontend; Gutenberg also shows the page-title input separately from the authored H1, as expected.

The previous `post_content` string search for `lmdl-page-v1` was replaced by an explicit selectable page template. Its small PHP file delegates rendering to Astra's `page.php`. The child theme applies scoped wrapper spacing, suppresses Astra's extra page H1 on these pages, and moves Astra's tablet breakpoint to 1199 px so its native compact menu appears before the desktop links wrap. The logo and booking menu item were sized/styled in the child theme. Astra still provides the header, footer, menu and page hooks. No double title, two-line menu or section/footer gap remains in the checked views.

## Frontend review and second pass

Real WordPress screenshots were inspected at **375, 768, 1024 and 1440 px** for both pages. The first pass found a wrapping 1024 px menu, excessive Astra content insets on mobile, a split mobile hub title, and separated panels that read as cards. The second pass corrected these: the mobile title now fits, the collage and CTA remain visible in the opening viewport, and the four paintings share one adjacent framed field. Desktop focus expands a panel moderately from 311 to 392 px at 1440 px while other labels remain readable. Tablet is 2 × 2; mobile stacks. The original HTML previews were regenerated and reviewed after the theme changes.

The automated browser check found one H1 per page, no horizontal overflow, no failed image, no frontend console error and no broken internal destination among the 13 checked local links. All four service names/elements and `Communication animale` canonical slug were present. The actual Astra skip link received the first Tab and was focus-visible; the mobile menu opened with `aria-expanded="true"` and retained the booking link. Panel focus has a solid outline. Panel link targets are at least 44 px. With reduced motion, transition duration is `0s` and the art transform is `none`.

The four `painting-*-display.webp` files total about **800 KiB**, around half the corresponding source art weight, without visible upscale in the checked layouts. Bundled painting images have explicit intrinsic dimensions in rendered HTML; the hero lead loads eagerly with high fetch priority. In local headless measurements after page load, Homepage LCP was about 0.27–1.72 s and CLS 0–0.05; hub LCP about 0.23–0.34 s and CLS 0–0.003. These loopback numbers establish layout behavior, not production speed. With the five plugins active, Homepage loaded 6 CSS files, hub 5, and each page 2 scripts after the V1 pages conditionally dequeued Timetics' unused global React bundle. The booking page is unaffected by that dequeue.

Rank Math produced one local self-canonical and one HTML `<title>` per page; the theme added no JSON-LD or duplicate schema. The five plugins activated without breaking the two pages or Gutenberg save/reload. Timetics, Forminator and Complianz features could not be meaningfully rendered without configured meetings, forms and consent content. LiteSpeed caching cannot be benchmarked on PHP's built-in server. The editor logged blocked external-network resource requests in the sandbox; no JavaScript exception, invalid block or failed save resulted.

## Validation and limits

- PHP lint: all four child-theme PHP files passed on PHP 8.5.8.
- Existing `python scripts/build-v1-preview.py` and `node scripts/review-v1-preview.mjs`: passed all eight viewport/page combinations, zero overflow, missing art or console errors.
- Actual WordPress and Gutenberg review: passed at four viewport widths and through repeated editing, serialization and reload.
- `git diff --check` and clean branch state should be checked at the final commit.

This foundation is ready for **code review and merge**, with no production deployment implied. Client-approved copy, credential wording, service logistics, genuine FAQ/Journal material, and configured booking/form/consent flows are separate publication gates. Next: review the branch, then prepare content and plugin configuration in a dedicated staging phase. Select **LMdL — Page V1** when creating the two real pages; never execute the disposable local fixture against production.
