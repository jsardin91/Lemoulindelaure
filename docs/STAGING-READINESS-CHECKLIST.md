# Staging readiness — Le Moulin de Laure V1

Status 2026-10-03: **main-domain V1 preview is live under temporary noindex; client content and operations are not ready for final indexing.** The owner approved this preview without separate staging. Never import `.local-wp/` fixtures or their TEST LOCAL records. Deployment evidence and rollback are in [PRODUCTION-PREVIEW-DEPLOYMENT-REPORT.md](PRODUCTION-PREVIEW-DEPLOYMENT-REPORT.md). The unchecked items below are the remaining release gates, not prerequisites that block the current noindex preview.

## Before final client approval and indexing

- [ ] Collect one consolidated response to [CLIENT-CONTENT-QUESTIONS.md](CLIENT-CONTENT-QUESTIONS.md); have Laure approve every public sentence, four FAQ answers, service terms, image/portrait/profile rights and exact training wording.
- [x] Install the reviewed child theme without touching Astra parent; verify Astra header/footer/menu and **LMdL — Page V1** template. Install the twelve V1 patterns. Optional receipt pages remain unpublished and out of navigation.
- [x] Flush rewrite rules once; check all service links and the canonical `/prendre-rendez-vous/` route. Recheck `/journal/[slug]/` when a real article exists.
- [ ] Create the real Forminator form with Nom, Email, Message only unless Laure approves more. Configure a real private recipient, delivery, retention, spam control, French validation, accessible required states and a truthful success message. Store its ID in site option `lmdl_forminator_contact_id`.
- [ ] Configure the real Timetics service/meeting structure from Laure's actual durations, prices, schedule, exceptions, timezone, location, buffers, minimum notice, horizon, capacity, cancellation/reschedule and notifications. Verify payments only if requested and approved. Set `lmdl_timetics_booking_mode=list` for a verified multi-meeting list or `lmdl_timetics_booking_id` for a verified single form. Do not copy the local 15-minute/zero-price fixture.
- [ ] In list mode, verify the installed plugin displays exactly the intended four services in a sensible order; its `limit=4` shortcode does not pin them by ID. Revisit service-based mode if the installed version supports it.
- [ ] Decide whether Timetics' native confirmation is truthful, especially its email claim. Verify actual sent email and reschedule/cancel links. Use `/reservation-confirmee/` only if a reliable redirect is tested.
- [ ] Complete Complianz with approved legal/consent text; classify Timetics, Forminator and any external resources. Test banner desktop/mobile, keyboard and focus without obscuring header, CTA or plugin modals.
- [ ] Complete Rank Math titles/descriptions and canonical settings for index pages; ensure receipts and Timetics duplicate URLs are noindex and excluded from the active sitemap, while remaining crawlable. No FAQPage until all visible answers are approved; never QAPage or duplicate schema.
- [ ] Configure LiteSpeed only after checking forms, Timetics AJAX/calendar, logged-out cache and consent states; avoid caching personalized booking responses.

## Final release QA gate

- [ ] Recheck FAQ, Contact and Booking at 375, 768, 1024, 1440 px, plus native mobile Timetics modal and confirmation.
- [ ] Use keyboard only for navigation, FAQ summary, form errors/correction, service/date/slot selection, modal close, confirmation and cancellation/replanification where enabled. Check focus visible, return focus and reduced motion. Escalate plugin defects instead of patching private JavaScript.
- [ ] After real recipients and services are approved, submit a controlled contact message and booking with a dedicated test identity; verify database state, receipt email and cancellation/replanification without charging or notifying a real client.
- [ ] Check browser console/network, no PHP notices, valid Gutenberg blocks after save/reload, links/404, canonical/robots/sitemap/schema, images/CLS and performance with the configured plugins.
- [ ] Recheck Homepage, hub, four service pages, Jardin, À propos, Journal and article on mobile/desktop after plugin configuration.
- [x] No TEST LOCAL fixture or localadmin label was imported into the main-domain preview.
- [ ] Obtain final client/content/SEO review, verify live configured journeys, then remove the temporary noindex through a separate reversible change and purge LiteSpeed.
