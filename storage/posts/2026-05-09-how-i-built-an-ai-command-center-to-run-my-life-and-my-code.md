---
title: "How I built an AI command center to run my life (and my code)"
description: "I got tired of repeating myself to every AI agent I worked with. So I built a centralized command center for my entire AI ecosystem — 65 files, 5,921 lines, 26 commits, built in 48 hours. Here's how."
image: "2026-05-09-how-i-built-an-ai-command-center-to-run-my-life-and-my-code.png"
---

You know what's been bugging me? Every time I started a new project, I had to re-teach my AI tools who I am. My preferences. My conventions. The way I like things done. Every. Single. Time.

I got tired of it. So I did what any sane person would do: I built a **centralized AI command center** for my entire machine.

Here's the story of how **ai-config** was born.

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

## The build: 48 hours of pure focus

I sat down on May 8th and didn't stop until it was done. Here's how it went down.

### Hour 0: The scaffold

Two commits. Folders, `.gitignore`, `.env` template. The foundation.

I knew exactly what I was building, so I laid out the bones first:

```
agents/       → 17 agent definitions (10 personal, 7 dev)
commands/     → 14 slash commands (7 personal, 7 dev)  
skills/       → 7 reusable Python utilities
mcp/          → 6 Model Context Protocol server configs
.opencode/    → 3 meta agents, 3 meta commands, 2 meta skills (local only)
```

### Hour 2: The registry

`AGENTS.md`. **298 lines** of pure operating manual. Every agent, every command, every skill, every server — registered, documented, cross-referenced. It's not just a config file; it's the **constitution** of my AI ecosystem.

Each entry follows a strict template:
- Role, triggers, model, file path
- Operating principles
- Workflow
- Output format
- Examples
- Constraints

No ambiguity. Every agent knows its job.

### Hour 6: The bootstrap script

**`setup.py`** — 764 lines of cross-platform Python. This is the heart of the operation. It:

1. Reads `.env` variables
2. Renders the `opencode.json` template with token substitution
3. Deep-merges everything into the live OpenCode config
4. Symlinks `agents/`, `commands/`, `skills/`, `mcp/` into `~/.config/opencode/`

I added dry-run mode. Force mode. Uninstall mode. Windows junction fallback. Because I don't do half-measures.

### Hour 12: MCP servers

Six servers. All running via `npx`. Filesystem, git, fetch, memory, sequential-thinking, time. Each one opens up a new superpower for my agents. The memory server alone is a game-changer — my agents can now remember context across sessions.

### Hour 18: The skills

Seven Python utilities, each laser-focused:

- `git_diff_summarizer.py` — parse diffs into structured chunks
- `conventional_commit.py` — format and lint conventional commits
- `feed_fetcher.py` — fetch RSS/Atom/JSON feeds
- `csv_ledger.py` — append/query CSV expense ledgers
- `markdown_journal.py` — daily markdown journal management
- `repo_indexer.py` — lightweight file/symbol indexing
- `secret_scanner.py` — regex + entropy-based secret detection

These aren't just scripts. They're **weapons** my agents can deploy at will.

### Hour 24: The agents

Ten **PERSONAL** agents for life management:

Budget coaching, news curation, social media strategy, inbox zero, daily planning, meal planning, trip planning, journaling, learning, decision-making.

Eight **DEV** agents for code work:

Code review, git history, documentation writing, debugging, refactoring, dependency auditing, prompt engineering, project onboarding.

Each one with a meticulously crafted prompt, workflow, and guardrails.

### Hour 36: Commands and polish

Fourteen slash commands — seven personal, seven dev. Plus the **local meta layer** (`.opencode/`) with three meta agents, three meta commands, and two meta skills for maintaining the framework itself.

### Hour 48: Documentation

README with TOC, contributing guidelines, license. Blog post explaining every design decision. Commit history cleaned up into 26 clean, conventional commits.

**5,921 lines. 65 files. 26 commits. One night's work.**

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

This is just the beginning. I've already got plans for:

- **More skills** — web scraping, data analysis, API integration
- **Better memory** — deeper cross-session context using the memory MCP server
- **Automated maintenance** — my meta agents are already self-healing the config

The ai-config project isn't a product. It's a **platform**. It's the operating system for my AI-powered workflow. And it's only going to get smarter.

Got questions? Want to know how I structured a specific agent or skill? Drop a comment. Or don't. Either way, I'll be here, refining the machine.

Because that's what I do.
