---
type: command
trigger: "/style"
---

# /style

## Purpose

Open a frontend-focused session for styling and design improvements.

## Usage

```
/style [component|page] [description]
```

## Parameters

- `component|page` — Optional: the specific Livewire component or view to work on (e.g., "blog", "article", "about-me").
- `description` — Optional: what you want to change or improve.

## Behavior

1. Invokes the `@frontend-designer` agent.
2. Reads the relevant Blade view and any associated SCSS/Tailwind config.
3. Proposes specific CSS/Tailwind changes for your review.
4. Shows exact code diffs for the changes.

## Examples

### Example 1 — Specific component

**Input:** `/style blog cards responsive`

**Output:** Agent reads the blog Blade view, analyzes current styling, and proposes responsive improvements.

### Example 2 — Open-ended

**Input:** `/style`

**Output:** Agent asks what you'd like to work on and guides from there.

## See also

- `@frontend-designer` agent — the agent that proposes styling changes.
- `resources/views/livewire/` — the Blade views for Livewire components.
- `tailwind.config.js` — the Tailwind configuration.
- `resources/css/app.scss` — the main SCSS entry point.
