---
type: command
trigger: "/blog"
---

# /blog

## Purpose

Scaffold a new blog post with proper front matter and date-based filename.

## Usage

```
/blog [title]
```

## Parameters

- `title` — The blog post title (optional, the agent will ask if not provided).

## Behavior

1. Invokes the `@blog-writer` agent.
2. Prompts for the post title (if not provided) and optional fields (tags, excerpt, image, custom date).
3. Creates a new markdown file at `storage/posts/YYYY-MM-DD-slug.md` with proper YAML front matter.
4. Confirms the file was created and shows the front matter.

## Examples

### Example 1 — Basic usage

**Input:** `/blog`

**Output:** Agent asks for the post title and optional fields, then creates the file.

### Example 2 — With title

**Input:** `/blog Getting Started with Laravel Livewire`

**Output:** Creates `storage/posts/2026-05-09-getting-started-with-laravel-livewire.md`.

## See also

- `@blog-writer` agent — the agent that performs the scaffolding.
- `storage/posts/` — where blog posts are stored.
