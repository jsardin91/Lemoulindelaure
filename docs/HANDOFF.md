# Handoff / Project State

Last updated: 2026-10-02

## Major milestone

**The full approved public site architecture now has a V1 UX/content design documented.**

Covered:
- Homepage
- Accompagnements
- 4 accompaniment detail pages
- Le Jardin
- À propos
- Journal
- FAQ
- Contact
- Prendre rendez-vous / Timetics

No production page build has started during this design pass.

## Functional page files

FAQ:
- `design/wireframes/FAQ-V1.md`

Contact:
- `design/wireframes/CONTACT-V1.md`

Booking:
- `design/wireframes/PRENDRE-RENDEZ-VOUS-V1.md`

References:
- `design/references/21ST-FUNCTIONAL-PAGES-REFERENCES.md`

## Booking architecture

Canonical URL:
`/prendre-rendez-vous/`

Timetics:
- embed on branded WordPress page;
- evaluate one service-based calendar for four services first;
- separate calendars only if service/group/availability requirements demand it;
- availability configured in Timetics;
- confirmation page noindex;
- no fake prices or schedules.

## Contact architecture

Forminator:
- Nom
- Email
- Message
- Subject only if Laure needs it.

Direct public email:
show only if approved/supplied.

## FAQ

Source questions recorded.
Answers remain pending Laure.

Schema:
choose one owner; avoid duplicate Rank Math/custom FAQ schema.

## Next phase

1. owner reviews design package;
2. collect missing content/business inputs;
3. SEO research;
4. implementation planning;
5. WordPress/Timetics build;
6. QA.

Canonical board:
`docs/DESIGN-PROGRESS.md`
