---
type: command
trigger: "/deploy"
---

# /deploy

## Purpose

Run pre-flight checks and deploy the site to production.

## Usage

```
/deploy [--force] [--skip-tests]
```

## Parameters

- `--force` — Skip confirmation prompts.
- `--skip-tests` — Skip test suite (use with caution).

## Behavior

1. Invokes the `@deploy-helper` agent.
2. Runs pre-flight checks: `.env` keys, PHPUnit tests, `npm build`, Pint linting.
3. If all checks pass, presents deploy options (push to main or manual rsync).
4. Does NOT execute the deploy automatically — presents steps for the user.

## Examples

### Example 1 — Normal deploy

**Input:** `/deploy`

**Output:** Pre-flight checks → if all green → deploy instructions.

### Example 2 — Failed checks

**Input:** `/deploy`

**Output:** Pre-flight checks → failure details → ask if help is needed fixing.

## See also

- `@deploy-helper` agent — the agent that performs the checks.
- `.github/workflows/deploy.yml` — the CI deploy workflow.
