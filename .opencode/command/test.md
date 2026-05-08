---
type: command
trigger: "/test"
---

# /test

## Purpose

Run the PHPUnit test suite with common options and get a friendly summary.

## Usage

```
/test [--feature] [--unit] [--filter=<pattern>] [--coverage]
```

## Parameters

- `--feature` — Run only Feature tests.
- `--unit` — Run only Unit tests.
- `--filter=<pattern>` — Run only tests matching the given pattern.
- `--coverage` — Run with coverage (requires Xdebug or PCOV).

## Behavior

1. Runs `php artisan test` with the specified subset.
2. Parses the output and shows a concise summary of passed/failed tests.
3. If failures occur, offers to invoke `@tdd-coach` to help resolve them.

## Examples

### Example 1 — Full suite

**Input:** `/test`

**Output:** Runs all tests and shows a pass/fail summary.

### Example 2 — Filtered

**Input:** `/test --filter=BlogTest`

**Output:** Runs only BlogTest tests.

## See also

- `@tdd-coach` agent — for TDD guidance when writing new tests or fixing failures.
