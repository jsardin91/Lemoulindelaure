# 21st MCP / CLI Setup

Official docs: https://docs.21st.dev/mcp

Official MCP endpoint:

```text
https://21st.dev/api/mcp
```

## Authentication

Install the official CLI and authenticate locally:

```bash
npm i -g @21st-dev/cli
21st login
```

Never commit a 21st API key.

For CI/scripts, use an environment variable such as `API_KEY_21ST`.

## Claude Code

```bash
npx @21st-dev/cli init --client claude --write
```

## Codex

```bash
npx @21st-dev/cli init --client codex
```

The Codex MCP configuration belongs in the user's Codex config, not in a committed secret-bearing file.

## Optional 21st agent skill

```bash
npx @21st-dev/cli install-skill
```

## Project usage rule

21st is a discovery/reference layer for this WordPress project. Before installing or copying any component, inspect its stack, keep only the interaction/composition idea if needed, and implement the final result with the WordPress/Astra child-theme architecture.
