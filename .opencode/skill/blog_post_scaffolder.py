"""
Blog post scaffolder for thebatclaud.io.

Creates correctly-formatted markdown blog post files with YAML front matter,
following the conventions used by the MarkdownPost model and spatie/yaml-front-matter.

Usage:
    from blog_post_scaffolder import scaffold_post

    scaffold_post(
        title="My Post Title",
        date="2026-05-09",
        slug="my-post-title",
        tags=["tech", "laravel"],
        excerpt="A brief summary...",
        image="filename.jpg"
    )
"""

import os
from datetime import date as Date
from typing import Optional


def slugify(title: str) -> str:
    """Convert a title to a URL-friendly slug."""
    return (
        title.lower()
        .replace(" ", "-")
        .replace("'", "")
        .replace('"', "")
        .replace("--", "-")
        .strip("-")
    )


def build_front_matter(
    title: str,
    slug: str,
    date_str: str,
    tags: Optional[list[str]] = None,
    excerpt: str = "",
    image: str = "",
) -> str:
    """Build YAML front matter string for a blog post."""
    tags_yaml = "\n".join(f"  - {tag}" for tag in (tags or []))
    return f"""---
title: "{title}"
slug: "{slug}"
date: {date_str}
tags:
{tags_yaml}
excerpt: "{excerpt}"
image: "{image}"
---

Start writing here...
"""


def scaffold_post(
    title: str,
    date_str: Optional[str] = None,
    slug: Optional[str] = None,
    tags: Optional[list[str]] = None,
    excerpt: str = "",
    image: str = "",
    posts_dir: str = "storage/posts",
) -> str:
    """
    Create a new blog post file with YAML front matter.

    Args:
        title: The post title.
        date_str: Date in YYYY-MM-DD format (defaults to today).
        slug: URL slug (defaults to slugified title).
        tags: List of tag strings.
        excerpt: Short post description.
        image: Hero image filename.
        posts_dir: Path to the storage/posts directory.

    Returns:
        The full path to the created file.

    Raises:
        FileExistsError: If a post with the same filename already exists.
    """
    if date_str is None:
        date_str = Date.today().isoformat()

    if slug is None:
        slug = slugify(title)

    filename = f"{date_str}-{slug}.md"
    filepath = os.path.join(posts_dir, filename)

    if os.path.exists(filepath):
        raise FileExistsError(f"Post already exists: {filepath}")

    front_matter = build_front_matter(
        title=title,
        slug=slug,
        date_str=date_str,
        tags=tags,
        excerpt=excerpt,
        image=image,
    )

    os.makedirs(posts_dir, exist_ok=True)

    with open(filepath, "w") as f:
        f.write(front_matter)

    return filepath


def read_post(filepath: str) -> dict:
    """
    Read an existing post and return its front matter as a dict.

    This is a simple parser; spatie/yaml-front-matter (PHP) is the source of truth.
    This is provided for quick reference / validation only.
    """
    import yaml

    with open(filepath) as f:
        content = f.read()

    parts = content.split("---", 2)
    if len(parts) < 3:
        raise ValueError(f"Invalid front matter in {filepath}")

    return yaml.safe_load(parts[1])
