# AI assistance

Use the package-owned [php-forge-coding-standard](../skills/php-forge-coding-standard/SKILL.md) skill for selecting PHP Forge ECS and Rector configurations for a supported PHP target. The canonical source is `skills/`; checkout discovery links in `.agents/skills/` and `.claude/skills/` point to that same source.

## Install in an application

Composer is the primary distribution path. `extra.skills.source` declares the bundle; installing the package alone does
not register its skill at the application root. In a consumer already configured for `llm/skills`, explicitly trust
`php-forge/coding-standard` and use that installed synchronizer's documented setup. Do not enable plugins or broaden trust by
copying an example. With verified auto-sync enabled, installation/update can synchronize the bundle; otherwise use
`composer skills:update` and inspect `composer skills:show`. Composer exit zero is not proof of client activation.

An optional pinned installer can use a local checkout or an installed package that contains the bundle:

```bash
npx skills@1.7.2 add /absolute/path/to/coding-standard --list
npx skills@1.7.2 add /absolute/path/to/coding-standard --skill php-forge-coding-standard --agent claude-code codex opencode
```

Keep project scope. Inspect a remote source with `--list` before claiming an unpublished skill is available there.
Copied installations must be refreshed after upgrades. The complete skill directory is the unit of installation.

## Discover and invoke

Open a fresh client session at the checkout or consumer root. Codex discovers `.agents/skills/php-forge-coding-standard/` and supports
`$php-forge-coding-standard` or its skill picker. Claude Code uses `.claude/skills/php-forge-coding-standard/` and `/php-forge-coding-standard`. For OpenCode, verify the
installed client's native skill tool and shared paths. Do not assume one client's invocation syntax works in another.

## Example prompts

Explicit Codex invocation:

```text
$php-forge-coding-standard
Prepare ECS and Rector wrappers for a PHP 8.1 consumer using this package. Preserve its src/tests paths and demonstrate dry-run commands; do not upgrade syntax to the host PHP version.
```

Natural selection:

```text
My project supports PHP 8.1 but runs tools on PHP 8.5. Configure its ECS and Rector wrappers using php-forge/coding-standard, preserve src and tests paths, and show non-mutating checks.
```

Record whether the client loads this skill rather than a global same-named copy. As an unrelated negative control, ask it to explain HTTP 301 versus 302 without inspecting the
repository or loading package skills.

## Verify the result

Capture the native load/tool evidence and selected source path, then execute the generated task checks against the
installed package. Cover the normal operation, the described boundary case and a failure/unsupported input. Inspect
generated code before executing it; use disposable fixtures for writes. Run the package's actual non-mutating checks
and report runtime versions, warnings and unavailable dependencies. Listing, manually reading the skill, or supplying
its body in a prompt does not prove native activation or functional execution.

[Back to README](../README.md)
