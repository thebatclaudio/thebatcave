"""
Laravel Sail operations for thebatclaud.io.

Provides helper functions for common Sail commands and status checks.

Usage:
    from sail_operations import sail_run, is_sail_installed, is_sail_running

    if is_sail_installed():
        sail_run("artisan", "migrate")
"""

import subprocess
import shutil
from pathlib import Path
from typing import Optional


def _sail_binary(project_root: Optional[str] = None) -> Optional[str]:
    """Return the path to the sail binary if it exists."""
    base = Path(project_root) if project_root else Path.cwd()
    sail_path = base / "vendor" / "bin" / "sail"
    return str(sail_path) if sail_path.exists() else None


def is_sail_installed(project_root: Optional[str] = None) -> bool:
    """Check if Laravel Sail is installed in the project."""
    return _sail_binary(project_root) is not None


def is_sail_running(project_root: Optional[str] = None) -> bool:
    """Check if Sail containers are currently running."""
    if not is_sail_installed(project_root):
        return False
    try:
        result = subprocess.run(
            ["docker", "ps", "--filter", "name=batcave", "--format", "{{.Names}}"],
            capture_output=True,
            text=True,
            timeout=10,
        )
        return "batcave" in result.stdout
    except (subprocess.TimeoutExpired, FileNotFoundError):
        return False


def sail_run(
    command: str,
    *args: str,
    project_root: Optional[str] = None,
    capture_output: bool = False,
) -> subprocess.CompletedProcess:
    """
    Run a command through Laravel Sail.

    Args:
        command: The sail subcommand (e.g., "artisan", "npm", "composer", "test").
        *args: Additional arguments for the subcommand.
        project_root: Project root directory (defaults to CWD).
        capture_output: If True, capture stdout/stderr instead of displaying.

    Returns:
        subprocess.CompletedProcess with the result.

    Raises:
        FileNotFoundError: If Sail is not installed.
    """
    sail = _sail_binary(project_root)
    if not sail:
        raise FileNotFoundError(
            "Laravel Sail is not installed. Run `composer require laravel/sail --dev`."
        )

    cmd = [sail, command, *args]
    return subprocess.run(
        cmd,
        capture_output=capture_output,
        text=True,
        check=False,
    )


def sail_up(project_root: Optional[str] = None) -> subprocess.CompletedProcess:
    """Start Sail containers in detached mode."""
    return sail_run("up", "-d", project_root=project_root)


def sail_down(project_root: Optional[str] = None) -> subprocess.CompletedProcess:
    """Stop Sail containers."""
    return sail_run("down", project_root=project_root)
