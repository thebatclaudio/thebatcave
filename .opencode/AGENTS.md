# AGENTS.md — thebatclaud.io (Local Scope)

This file registers agents, commands, skills, and MCPs that are scoped to the
`thebatcave` project (thebatclaud.io). These entries are discovered automatically
by OpenCode when the working directory is this project.

**Important:** These entries are LOCAL only — they do not affect other projects.
Global entries (from `~/.config/opencode/`) are still available alongside these.

---

## Agent Registry (Local)

| Name | Trigger | Role | File |
|------|---------|------|------|
| blog-writer | `@blog-writer` or `/blog` | Scaffold new blog posts with YAML front matter | `agent/blog-writer.md` |
| tdd-coach | `@tdd-coach` or `/test` | Guide TDD cycles with PHPUnit | `agent/tdd-coach.md` |
| deploy-helper | `@deploy-helper` or `/deploy` | Pre-flight checks and deploy guidance | `agent/deploy-helper.md` |
| frontend-designer | `@frontend-designer` or `/style` | Tailwind/SCSS/Vite styling help | `agent/frontend-designer.md` |

## Command Registry (Local)

| Trigger | Purpose | File |
|---------|---------|------|
| `/blog` | Create a new blog post stub | `command/blog.md` |
| `/test` | Run PHPUnit with common options | `command/test.md` |
| `/deploy` | Pre-flight checks + deploy instructions | `command/deploy.md` |
| `/style` | Frontend styling session | `command/style.md` |
| `/sail` | Laravel Sail operations | `command/sail.md` |

## Skill Registry (Local)

| Name | Entry Point | Purpose |
|------|-------------|---------|
| blog_post_scaffolder | `skill/blog_post_scaffolder.py` | Blog post creation logic (front matter, filename) |
| sail_operations | `skill/sail_operations.py` | Sail command wrappers and status checks |

## MCP Registry (Local)

None. All required MCPs are available globally (filesystem, git, fetch, etc.).

---

## Conventions

| Concern | Rule |
|---------|------|
| File naming | `kebab-case.md` for agents/commands; `snake_case.py` for skills |
| One per file | Exactly one agent/command per file |
| Scope | All entries here are **local** to the thebatcave project |
| Secrets | Never hard-code — use `.env` or environment variables |
