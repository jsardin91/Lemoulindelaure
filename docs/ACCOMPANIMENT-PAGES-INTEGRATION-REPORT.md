# Local integration — four accompaniment pages V1

Date: 2026-10-02. Branch: `feat/accompaniment-pages-v1`. The validated Homepage and hub foundation was fast-forwarded from `feat/home-accompagnements-v1` to `main` at `25bbbd12892f876f92254e959bf9c34c2d49db6b` and pushed before this branch was created. No deployment, live WordPress page or database, workflow, secret, or Astra parent file was touched.

## Implementation

`inc/accompaniment-page-patterns.php` registers four full-page native Gutenberg patterns: `lmdl/earth-accompaniment-v1`, `lmdl/fire-accompaniment-v1`, `lmdl/water-accompaniment-v1`, `lmdl/air-accompaniment-v1`. Each uses a source-order copy-first hero, one original painting, service-specific editorial sections, a booking/contact close and three related-service links. The patterns use core group, heading, paragraph and image blocks. Text, art, title and section order are editable. Select **LMdL — Page V1** for the page template. The public label and route are **Communication animale** and `/accompagnements/communication-animale/`.

The shared `assets/css/pages/accompaniment-detail.css` supplies the layout and four universe modifiers. The approved tokens, type, logo and Astra header/footer remain. `functions.php` registers the patterns, loads this CSS only on the four canonical detail slugs and gives their hero art intrinsic dimensions, eager loading and high fetch priority at render time. No JavaScript or 21st component code was added. Editor-only notes (`lmdl-pattern-placeholder`) mark missing client information and are hidden publicly.

## Design and content decisions

- Terre: the richest page because the brief supports audience, broad motivations, remote/presentiel and approximate three-day communication. The animal's individuality and veterinary boundary are prominent. The exact Laila credential wording is omitted.
- Feu: intentionally shorter. No invented energetic protocol, cases, effect or training. A separate veterinary boundary remains visible.
- Eau: quiet blue editorial statement attributed to Laure's approach, adult audience, confidential posture, individual/group formats without invented mechanics and no guarantee of a message.
- Air: open composition and lavender paper field. The description stays broad; no prediction, certainty or invented method.
- All pages omit pricing, durations of appointments, fabricated testimonials and unanswered FAQ accordions. Booking links go to the existing booking route without unverified preselection.

21st MCP previews inspected: [Editorial Hero](https://21st.dev/@felipemenezes098/components/hero-05) informed the generous negative space and art-led editorial hierarchy; the split itself follows the project wireframes. [Two-Column FAQ](https://21st.dev/@ln-dev7/components/faqs-02) informed the plain question/contact area, but the accordion was deferred because answers are unavailable. [Editorial Testimonial](https://21st.dev/@jatin-yadav05/components/editorial-testimonial) informed the scale of the attributed Eau/Air statements, without a fake testimonial. A [vertical process reference](https://21st.dev/@ln-dev7/components/how-it-works-02) was considered but rejected until real steps exist. UI/UX Pro Max checked heading sequence, navigation depth, targets and mobile-first reading order. Taste Skill removed repeated cards and generic section styling. Frontend Design Pro guided the shared CSS and four restrained variations.

## Isolated WordPress verification

The ignored `/.local-wp/` instance runs WordPress 7.1.2, Astra 4.14.0, child theme and PHP 8.5.8 on `127.0.0.1:8765`. Four existing local shell pages (IDs 6–9) received the patterns and template; this fixture is not production content. In Gutenberg, all **87 Terre, 57 Feu, 64 Eau and 57 Air blocks (265 total)** validated. Each page passed two paragraph edit/save/reload cycles, plus title, image and section-reorder save/reload, followed by restoration. No editor console errors were recorded.

Edge headless captured all 16 page/width combinations at **375, 768, 1024 and 1440 px**, plus full-page mobile/desktop views. Each had one H1, no horizontal overflow, no broken image, no frontend console error and its conditional detail CSS. All seven tested internal routes returned HTTP 200. Editor-only notes were `display:none` in every frontend view. The hero image precedes no text in the DOM; copy and CTAs come first. The booking CTA is 48 px high and shows keyboard focus after a Tab input. Reduced-motion mode was used for the full matrix; the detail pages have no ongoing animation. Bundled WebP art has intrinsic dimensions at render time.

The first visual pass exposed a broken desktop wrap in the long Feu H1, low contrast on the Eau posture heading, underlined button text and internal-status copy visible publicly. These were corrected; the second 16-view pass and renewed screenshots passed. The parent Astra mobile menu remains unchanged. PHP lint passed on all five child-theme PHP files; `git diff --check`, `python scripts/build-v1-preview.py` and `node scripts/review-v1-preview.mjs` passed. Existing Homepage/hub previews showed no regression.

## Still needed before public release

Laure must review and fact-check all provisional public copy. She must supply the precise energetic offer, audience and situations; process, format, preparation, duration and price for each service; dedicated FAQ questions and answers; exact documentary wording for the animal-communication training; specific remote/presentiel rules; and booking configuration. Confirm the language and limits around deceased-message and guidance services. Populate booking/contact/legal and SEO metadata in staging, then repeat the integration review there. The branch is for code review only and must not be merged or deployed automatically.
