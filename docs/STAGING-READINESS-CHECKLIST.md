# Staging readiness — Le Moulin de Laure V1

Status 2026-10-02: **code branch review ready; staging content/operations not ready**. Work only on an isolated staging WordPress, never on production. Do not import `.local-wp/` fixtures or their TEST LOCAL records.

## Before any public staging review

- [ ] Collect one consolidated response to [CLIENT-CONTENT-QUESTIONS.md](CLIENT-CONTENT-QUESTIONS.md); have Laure approve every public sentence, four FAQ answers, service terms, image/portrait/profile rights and exact training wording.
- [ ] Install the reviewed child theme without touching Astra parent; verify Astra header/footer/menu and **LMdL — Page V1** template. Insert the matching complete pattern into FAQ, Contact, Booking and any receipt pages. Keep receipt pages out of navigation.
- [ ] Flush rewrite rules once; check `/journal/[slug]/`, all service links and the canonical `/prendre-rendez-vous/` route.
- [ ] Create the real Forminator form with Nom, Email, Message only unless Laure approves more. Configure a real private recipient, delivery, retention, spam control, French validation, accessible required states and a truthful success message. Store its ID in site option `lmdl_forminator_contact_id`.
- [ ] Configure the real Timetics service/meeting structure from Laure's actual durations, prices, schedule, exceptions, timezone, location, buffers, minimum notice, horizon, capacity, cancellation/reschedule and notifications. Verify payments only if requested and approved. Set `lmdl_timetics_booking_mode=list` for a verified multi-meeting list or `lmdl_timetics_booking_id` for a verified single form. Do not copy the local 15-minute/zero-price fixture.
- [ ] In list mode, verify the installed plugin displays exactly the intended four services in a sensible order; its `limit=4` shortcode does not pin them by ID. Revisit service-based mode if the installed version supports it.
- [ ] Decide whether Timetics' native confirmation is truthful, especially its email claim. Verify actual sent email and reschedule/cancel links. Use `/reservation-confirmee/` only if a reliable redirect is tested.
- [ ] Complete Complianz with approved legal/consent text; classify Timetics, Forminator and any external resources. Test banner desktop/mobile, keyboard and focus without obscuring header, CTA or plugin modals.
- [ ] Complete Rank Math titles/descriptions and canonical settings for index pages; ensure receipts and Timetics duplicate URLs are noindex and excluded from the active sitemap, while remaining crawlable. No FAQPage until all visible answers are approved; never QAPage or duplicate schema.
- [ ] Configure LiteSpeed only after checking forms, Timetics AJAX/calendar, logged-out cache and consent states; avoid caching personalized booking responses.

## Staging QA gate

- [ ] Recheck FAQ, Contact and Booking at 375, 768, 1024, 1440 px, plus native mobile Timetics modal and confirmation.
- [ ] Use keyboard only for navigation, FAQ summary, form errors/correction, service/date/slot selection, modal close, confirmation and cancellation/replanification where enabled. Check focus visible, return focus and reduced motion. Escalate plugin defects instead of patching private JavaScript.
- [ ] Submit a real staging-only contact message and booking using dedicated test identity; verify database state, receipt email, cancellation/replanification and no production notification or payment.
- [ ] Check browser console/network, no PHP notices, valid Gutenberg blocks after save/reload, links/404, canonical/robots/sitemap/schema, images/CLS and performance with the configured plugins.
- [ ] Recheck Homepage, hub, four service pages, Jardin, À propos, Journal and article on mobile/desktop after plugin configuration.
- [ ] Remove all TEST LOCAL content and localadmin labels from staging, obtain final client/content/SEO review, then make a separate explicit production plan. This checklist does not authorize deployment.
