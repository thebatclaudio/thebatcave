---
title: "How I built an AI command center to run my life (and my code)"
description: "A single GitHub repo that defines, documents, and deploys every AI agent, command, and skill I use. No more scattered configs. Everything in one place."
image: "2026-05-09-how-i-built-an-ai-command-center-to-run-my-life-and-my-code.png"
---

The idea was born while working with my team at **Airalo**. We were sharing different global MCP configurations, an `AGENTS.md`, skills, and all sorts of OpenCode setup files — passing them around on Slack, copy-pasting, hoping nobody missed the latest update. It worked, but it was messy.

So, being a developer, I thought: *why not put this in a GitHub repo?* Version-controlled, documented, one source of truth. That was the spark.

The team setup worked great — so great that I decided to do the same for myself with my personal things. Budgeting, journaling, meal planning, learning — all the stuff I manage outside of work. If a shared repo worked for a team, why wouldn't it work for *me* and all my different AI agents?

Here's the story of how **ai-config** was born.

I'll be honest: I didn't hand-roll every line of this. I built the entire system using [OpenCode](https://github.com/opencode-ai) with **Claude Opus 4.7** — the AI handled the scaffolding, the prompts, the documentation, and the orchestration. What you're reading is the result of about an hour of guided AI work, not a sleepless weekend of manual typing. And yes — this very article was written by the **Blog-Writer agent**, one of the agents I created for my Laravel blog project using the `/onboard` command right here in `ai-config`. All the code is on GitHub at [github.com/thebatclaudio/ai-config](https://github.com/thebatclaudio/ai-config).

## The problem: 17 agents, 14 commands, 7 skills, 6 servers — zero coordination

I've been accumulating AI tools like Batman accumulates gadgets. **OpenCode** agents for code review, git history, documentation. Personal agents for budgeting, news, meal planning, journaling. Slash commands for everything from committing code to planning my day.

But they were scattered. Fragmented. Each one had its own idea of how the world worked. Some didn't even know about the others. My budget agent didn't know my journal format. My code reviewer didn't know my commit conventions.

It was chaos. And I hate chaos.

## The vision: one config to rule them all

I wanted a **single source of truth** — a repository where every agent, every command, every tool I'd ever need was defined, documented, and deployed from one place. A **Batcave** for my AI, if you will.

Here's what I needed:

- **Global agents** — available everywhere, in every project
- **Local agents** — only active when I'm working on the config itself (meta-tooling for framework maintenance)
- **Reusable skills** — Python utilities that any agent could call
- **MCP servers** — Model Context Protocol servers for filesystem access, git operations, web fetching, memory, time, and multi-step reasoning
- **Zero friction** — one command to bootstrap everything

## The build: ~1 hour with AI

I sat down on May 8th with OpenCode and Claude Opus 4.7 and let the AI do the heavy lifting. Here's how it went down.

### Step 1: The scaffold

Two commits. Folders, `.gitignore`, `.env` template. The foundation.

I knew exactly what I was building, so I laid out the bones first:

```
agents/       → 17 agent definitions (10 personal, 7 dev)
commands/     → 14 slash commands (7 personal, 7 dev)  
skills/       → 7 reusable Python utilities
mcp/          → 6 Model Context Protocol server configs
.opencode/    → 3 meta agents, 3 meta commands, 2 meta skills (local only)
```

### Step 2: The registry

`AGENTS.md`. **298 lines** of pure operating manual. Every agent, every command, every skill, every server — registered, documented, cross-referenced. It's not just a config file; it's the **constitution** of my AI ecosystem.

Each entry follows a strict template:
- Role, triggers, model, file path
- Operating principles
- Workflow
- Output format
- Examples
- Constraints

No ambiguity. Every agent knows its job.

### Step 3: The bootstrap script

**`setup.py`** — 764 lines of cross-platform Python. This is the heart of the operation. It:

1. Reads `.env` variables
2. Renders the `opencode.json` template with token substitution
3. Deep-merges everything into the live OpenCode config
4. Symlinks `agents/`, `commands/`, `skills/`, `mcp/` into `~/.config/opencode/`

I added dry-run mode. Force mode. Uninstall mode. Windows junction fallback. Because I don't do half-measures.

### Step 4: MCP servers

Six servers. All running via `npx`. Filesystem, git, fetch, memory, sequential-thinking, time. Each one opens up a new superpower for my agents. The memory server alone is a game-changer — my agents can now remember context across sessions.

### Step 5: The skills

Seven Python utilities, each laser-focused:

- `git_diff_summarizer.py` — parse diffs into structured chunks
- `conventional_commit.py` — format and lint conventional commits
- `feed_fetcher.py` — fetch RSS/Atom/JSON feeds
- `csv_ledger.py` — append/query CSV expense ledgers
- `markdown_journal.py` — daily markdown journal management
- `repo_indexer.py` — lightweight file/symbol indexing
- `secret_scanner.py` — regex + entropy-based secret detection

These aren't just scripts. They're **weapons** my agents can deploy at will.

### Step 6: The agents

Ten **PERSONAL** agents for life management:

Budget coaching, news curation, social media strategy, inbox zero, daily planning, meal planning, trip planning, journaling, learning, decision-making.

Eight **DEV** agents for code work:

Code review, git history, documentation writing, debugging, refactoring, dependency auditing, prompt engineering, project onboarding.

Each one with a meticulously crafted prompt, workflow, and guardrails.

### Step 7: Commands and polish

Fourteen slash commands — seven personal, seven dev. Plus the **local meta layer** (`.opencode/`) with three meta agents, three meta commands, and two meta skills for maintaining the framework itself.

### Step 8: Documentation

README with TOC, contributing guidelines, license. Blog post explaining every design decision. Commit history cleaned up into 26 clean, conventional commits.

**5,921 lines. 65 files. 26 commits. About one hour's work (with AI).**

## The architecture: global vs. local

The key insight I landed on was **two layers**:

- **Global** (`agents/`, `commands/`, `skills/`, `mcp/`) — these are symlinked into `~/.config/opencode/` and are available in **every project** on my machine. My code reviewer works in every repo. My budget coach works everywhere.
  
- **Local** (`.opencode/` inside the `ai-config` repo) — these are **project-scoped**. They only activate when I'm working on the config itself. They're the meta-tooling: linting AGENTS.md, validating symlinks, scaffolding new entries.

This distinction is crucial. I don't want my AI maintenance tools leaking into my web projects. And I don't want my web project tools cluttering my AI config work.

Clean separation. No bleeding.

## What I learned

Building this taught me something important about AI workflows: **your tools are only as good as your configuration**.

A poorly prompted agent is worse than no agent. A skill without documentation is a trap. A command without an example is a riddle.

So I went hard on **documentation**:
- Every agent has examples (plural)
- Every command has a full usage spec
- Every skill has a doc block
- The AGENTS.md is the single source of truth

No shortcuts. No "I'll document it later." Because later never comes.

## What's next?

I'm far from done. I've already got plans for:

- **More skills** — web scraping, data analysis, API integration
- **Better memory** — deeper cross-session context using the memory MCP server
- **Automated maintenance** — my meta agents are already self-healing the config

This whole thing lives on GitHub at [github.com/thebatclaudio/ai-config](https://github.com/thebatclaudio/ai-config) — but it's really **for me**. It's my personal AI config, version-controlled so I don't lose it, tweakable whenever I need something new.

If you find it useful or want to steal ideas for your own setup, go for it. If you want to fork it and make it yours, even better. But the real goal here is **inspiration** — showing what's possible when you treat your AI tooling as a first-class codebase, not an afterthought. Build your own. Make it yours. That's the point.
