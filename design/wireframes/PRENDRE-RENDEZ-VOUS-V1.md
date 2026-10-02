# Prendre rendez-vous — Timetics Booking Page V1

Status: **working UX/integration design — configuration details pending**

Last updated: 2026-10-02

URL:
`/prendre-rendez-vous/`

Booking system:
**Timetics**

## Page job

Move a visitor from “I know what I want” to a confirmed appointment with minimal friction while preserving Le Moulin’s visual identity.

This is the canonical public booking entry point.

Do not send visitors first to an unbranded external Timetics page when the embed can support the required flow.

---

# 1. Page intro

Compact:
- H1 **Prendre rendez-vous**
- short explanation;
- reassure visitor that they can choose the accompaniment and an available slot.

Known availability from client brief:
- appointments mainly evenings;
- Saturdays.

Do not state exact hours until Timetics schedules are configured.

---

# 2. Choose the accompaniment

Before or integrated with Timetics, make the four choices explicit:

1. Communication animalière
2. Accompagnement énergétique animalier
3. Connexion avec les défunts
4. Guidance pour soi

Each option:
- animal/element identity;
- plain service name;
- one short sentence;
- no long sales copy.

If the visitor arrives from a detail page:
- preserve/preselect the accompaniment where technically reliable;
- still allow changing choice.

## Timetics configuration decision

Official Timetics supports service-based booking with service selection, duration, price, availability, optional provider/location and advanced rules.

Preferred architecture:
- evaluate **one service-based booking calendar containing the four services** first;
- use separate calendars only when different service logic/availability/group settings make one calendar impractical.

Do not lock this choice until service duration/price/group details are confirmed.

---

# 3. Embedded booking experience

Official Timetics embed supports HTML embedding and brand color/background/text configuration.

Embed inside the WordPress page.

Design shell:
- intro/service selector above;
- Timetics embed in a clean Paper surface;
- no duplicate fake calendar beside it.

Brand:
- configure Timetics colors to approved Moulin palette as far as supported;
- do not inject fragile CSS into third-party internals unless documented/safe.

Responsive:
- test real embed at 375 / 768 / 1024 / 1440;
- avoid nested horizontal scrolling;
- ensure iframe/embed height behavior does not create clipped content.

---

# 4. Availability configuration

Official Timetics supports:
- reusable availability schedules;
- timezone;
- date-specific exceptions;
- buffer time;
- booking limits;
- minimum notice;
- booking timeframe.

Project configuration should encode Laure’s real schedule, not hardcode availability in page copy.

Initial client constraint:
- evenings;
- Saturdays.

Before launch:
- define exact weekly hours;
- timezone;
- holidays/exceptions;
- minimum notice;
- buffers;
- max bookings if needed.

---

# 5. Group / individual booking

Client brief mentions individual or group formats for “messages”.

Timetics supports group booking settings.

Before configuring:
- confirm which accompaniment(s) allow group format;
- group capacity;
- pricing;
- duration;
- whether group sessions use the same calendar or separate service/calendar.

Do not expose “group booking” globally before Laure confirms it.

---

# 6. Booking questions

Timetics supports custom booking questions.

Use only information genuinely needed for the appointment.

Do not collect sensitive/medical information by default.

Potential questions must be defined per service after Laure specifies her process.

Keep form burden low.

---

# 7. Price / payment

Timetics service booking supports price, deposits, coupons/refunds depending configuration.

Project decision remains pending because pricing is not supplied in the client brief.

Do not display:
- fake prices;
- “free”;
- deposit rules;
- refund claims.

Once Laure supplies commercial terms:
- make price transparent before final booking;
- ensure cancellation/refund wording matches configuration/legal terms.

---

# 8. Confirmation

After booking:
- show clear confirmation;
- use Timetics after-booking redirect if configured to return to a branded WordPress confirmation page.

Recommended noindex page:
`/reservation-confirmee/`

Content:
- booking confirmed;
- what happens next only if factually configured;
- management/reschedule link if Timetics supplies it;
- return to site.

Do not promise reminder email unless configured/tested.

---

# 9. Cancellation / rescheduling

Timetics supports cancellation/rescheduling rules.

Before launch:
- configure rules;
- ensure public wording matches actual rules;
- do not create conflicting WordPress copy.

Possible noindex page:
`/reservation-annulee/` only if needed by redirect flow.

---

# 10. Failure / no availability

Design for:
- no slot available;
- embed loading/error;
- selected service unavailable.

Fallback:
- **Contact** link;
- no dead-end screen.

Do not show false scarcity/urgency.

---

# Accessibility

Timetics owns much of the calendar interaction inside its embed, but project QA must still test:
- keyboard journey;
- focus visibility;
- locale/date labels;
- mobile tap targets;
- contrast;
- screen-reader flow where possible.

The page outside the embed must remain semantic and simple.

---

# 21st usage

21st calendar/date-picker components are **reference only**.

Do not build a second calendar UI on top of Timetics.

Useful references may help evaluate:
- spacing;
- accessible date selection;
- selected/unavailable states.

But Timetics remains the functional source of truth.

---

# Official Timetics capabilities verified for this design

Documentation reviewed:
- Service-Based Booking
- Embed booking calendar
- Availability setup
- booking/group/cancellation/rescheduling capabilities

These support the proposed V1 architecture.

## Inputs needed before configuration

For each accompaniment:
1. duration;
2. price;
3. exact availability;
4. location / remote mode;
5. buffer;
6. booking notice;
7. booking horizon;
8. booking questions;
9. cancellation/rescheduling;
10. group rules if applicable.
