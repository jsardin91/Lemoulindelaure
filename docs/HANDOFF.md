# Handoff / Project State

Last updated: 2026-09-27

## Done

- Repository structure normalized.
- WordPress/Astra stack documented.
- UI/UX Pro Max bootstrap retained.
- Taste Skill vendored for Codex and Claude Code.
- 21st MCP usage/setup documented.
- WordPress custom-code directories reserved.
- SSH diagnostic verified a single WordPress installation with Astra and WP-CLI on PlanetHoster without printing server paths.
- Design work gated until brand guidelines arrive.
- Client logo and four original paintings integrated on `main`; business-card photographs reviewed but excluded from Git. Draft palette, logo variants, four door illustrations and Astra child-theme assets are available. Formal approval and service list remain open.
- UI/UX Pro Max installed locally for Codex and Claude; typography benchmark completed. Astra child theme now seeds native palette and self-hosted Lora/Source Sans 3 on first activation and provides default logo/site icon fallbacks.
- Child theme installed and activated on https://lemoulindelaure.fr via GitHub Actions run 36317867110. Public check confirms the child stylesheet, header logo, Astra palette color `#165a77`, Lora headings and Source Sans 3 body. The live home page still contains WordPress sample content; the door and painting assets are packaged but are not placed on pages.

## Waiting on

- Formal client brand guidelines, source vector logo and approved service taxonomy.
- GitHub repository currently reports `public`; original client artwork is now present on `main`. Change repository visibility if the client expects private source storage.
- Approved service names, destinations and real HTML page copy before placing portal links and replacing WordPress sample content.
- Existing Structured FAQ plugin source, when ready to import.

## Do not do yet

- Do not treat the draft palette, artwork mapping or typography as formally approved.
- Do not mark the design system active.
- Keep later production releases manual and reviewable; the install workflow can be rerun with `workflow_dispatch`.
- Do not modify Astra parent theme.
