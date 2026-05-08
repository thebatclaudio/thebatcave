---
type: command
trigger: "/sail"
---

# /sail

## Purpose

Run common Laravel Sail commands without typing the full `./vendor/bin/sail` path.

## Usage

```
/sail [up|down|restart|artisan <cmd>|test|npm <cmd>|composer <cmd>]
```

## Parameters

- `up` — Start Sail containers (detached).
- `down` — Stop Sail containers.
- `restart` — Restart Sail containers.
- `artisan <cmd>` — Run an artisan command inside Sail (e.g., `artisan migrate`).
- `test` — Run PHPUnit tests inside Sail.
- `npm <cmd>` — Run an npm command inside Sail (e.g., `npm run dev`).
- `composer <cmd>` — Run a composer command inside Sail.

## Behavior

1. Checks if Sail is installed (`./vendor/bin/sail` exists).
2. Runs the requested command through `./vendor/bin/sail`.
3. Shows the output and any helpful next steps.

## Examples

### Example 1 — Start Sail

**Input:** `/sail up`

**Output:** Starts Docker containers and shows logs.

### Example 2 — Run migrations

**Input:** `/sail artisan migrate`

**Output:** Runs `php artisan migrate` inside the Sail container.

### Example 3 — Run tests in Sail

**Input:** `/sail test`

**Output:** Runs `php artisan test` inside Sail.

## See also

- `@frontend-designer` agent — for frontend work that may need `npm run dev`.
- `@tdd-coach` agent — for TDD guidance alongside `/sail test`.
