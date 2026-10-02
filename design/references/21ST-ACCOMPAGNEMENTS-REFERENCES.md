# 21st Reference Study — Accompagnements Hub

Status: **research reference — not implementation code**

Last updated: 2026-10-02

## Goal

Find interaction/composition ideas for presenting four distinct accompaniment universes without falling into a generic four-card services grid.

## Relevant 21st catalogue families

### Expand on hover

Catalogue:
https://21st.dev/community/components/s/image

Useful:
- one item receives more visual space on pointer/focus
- creates focus without navigating immediately

Adaptation:
- essentials always visible
- focus state mirrors hover
- no dependence on hover for content
- disable expansion under reduced motion if needed

Decision:
**use interaction principle**

### Fluid Expanding Grid

Catalogue:
https://21st.dev/community/components/s/image
https://21st.dev/community/components/explore/expanding-search-bar

Useful:
- dynamic redistribution of space among multiple items
- can turn a flat grid into a more immersive exploration field

Adaptation:
- only desktop
- four panels remain identifiable
- no extreme shrinking
- mobile becomes stacked gateways

Decision:
**use as desktop behavior reference**

### Service Grid — Ravi Katiyar

Catalogue:
https://21st.dev/community/components/s/image

Useful:
- service hierarchy and scannability
- clear destination pattern

Adaptation:
- reject card-grid visual language
- reuse only clear information hierarchy

Decision:
**information hierarchy reference only**

### Interactive Selector

Catalogue examples:
https://21st.dev/community/components/explore/landing-page-components

Useful:
- explicit active selection
- potential future “choose a path” interaction

Adaptation:
- do not turn the page into a quiz
- no recommendation algorithm
- simple descriptive orientation only

Decision:
**possible secondary inspiration, not core UI**

## Why no carousel

21st also exposes many image/carousel patterns.

For this page, a carousel is rejected because:
- all four universes should be visible/discoverable without swiping
- mobile users should not need gesture discovery
- direct linking/scanning is more important than playful browsing

## Why no generic cards

The four universes are the client's core brand/story structure.

Presenting them as four standard white cards would flatten:
- animal symbolism
- elemental identity
- original paintings
- door concept
- emotional differentiation

The design should therefore use a shared scene/system rather than four independent UI cards.

## MCP handoff prompt

When using Codex/Claude with 21st MCP, search:
- expanding image panels accessible
- fluid expanding grid
- editorial service navigation
- image hover expand
- four panel interactive gallery

Ask for preview candidates only. Do not install before comparing against:
- `design-system/MASTER.md`
- `design/wireframes/ACCOMPAGNEMENTS-V1.md`
