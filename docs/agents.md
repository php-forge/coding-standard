# AI assistance

The package owns [php-forge-coding-standard](../skills/php-forge-coding-standard/SKILL.md), a skill for selecting and
verifying shared ECS and Rector configurations against a consumer's minimum PHP version.

## Install in an application

### Automatic Composer installation

Install `php-forge/coding-standard` as described in the [README](../README.md#installation). Complete the
[one-time application setup](https://yii2-framework.github.io/docs/project/ai-agents/#composer-installation) for
`llm/skills`, enable `auto-sync` in `skills.json`, and explicitly trust `php-forge/coding-standard` in
`dependencies.composer.trusted`. The installed package must contain the skill bundle declared by `extra.skills.source`.

```bash
composer install
composer skills:show
```

With auto-sync disabled, run `composer skills:update` after installing or updating dependencies. Installing this package
alone does not register its skill at the application root. Check the synchronizer's output; Composer success alone does
not prove synchronization or activation.

### Optional npx installation

From the application root, list and install from a checkout containing the skill:

```bash
npx skills@1.7.2 add /absolute/path/to/coding-standard --list
npx skills@1.7.2 add /absolute/path/to/coding-standard \
  --skill php-forge-coding-standard --agent claude-code codex opencode
```

An installed `./vendor/php-forge/coding-standard` may be used when that revision contains the bundle. Inspect a remote
source before assuming it is published. Keep project scope and refresh copied skills after upgrades.

## Native discovery and activation

| Client      | Project directory                           | Explicit invocation                               |
| ----------- | ------------------------------------------- | ------------------------------------------------- |
| Codex       | `.agents/skills/php-forge-coding-standard/` | `$php-forge-coding-standard` or the skill picker  |
| Claude Code | `.claude/skills/php-forge-coding-standard/` | `/php-forge-coding-standard`                      |
| OpenCode    | `.agents/skills/php-forge-coding-standard/` | Request the skill through the client's skill tool |

The checkout links both discovery paths to the canonical directory. Open a fresh session at the application root and
check the available skills. Source listing, native discovery, activation and successful task behavior are separate
checks; manually reading the skill or supplying its body does not prove native activation.

## Example prompts

### Explicit invocation

```text
$php-forge-coding-standard
Prepare ECS and Rector wrappers for a PHP 8.1 consumer using the installed package. Preserve src and tests paths.
Show non-mutating commands and check that the running PHP version does not change the target. Do not install
dependencies.
```

### Natural selection

```text
My project supports PHP 8.1 but runs tools on PHP 8.5. Configure ECS and Rector using the installed
php-forge/coding-standard package, preserve src and tests paths, and show non-mutating checks.
```

### Verify the outcome

Inspect the installed revision and the selected entrypoints. Confirm the ECS builder and Rector closure are used in the
correct wrappers, and run the proposed commands against disposable fixtures. Cover an unsupported target and check
that dry runs do not modify inputs. Capture native load evidence and the selected source path separately from executable
results. As a negative selection control, ask an unrelated question in a fresh session without loading package skills.

[Back to README](../README.md)
