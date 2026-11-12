---
name: php-forge-coding-standard
description: Use when selecting PHP Forge ECS and Rector configurations for a supported PHP target.
license: BSD-3-Clause
---

# Use php-forge/coding-standard

## Resolve the package

Inspect the installed package path, actual source and Composer metadata before choosing APIs. The current PHP constraint
is `>=8.1`. A lockfile or branch alias alone does not prove the installed files match it. Use
local guides at that revision; if a guide is excluded from the archive, consult the matching repository revision, not
unverified current documentation. Installing this skill does not install dependencies or authorize mutations.

## Package contracts

Select `src/ecs-81.php` through `ecs-84.php` and the corresponding Rector configuration from the consumer's minimum
supported PHP version, not the interpreter currently running. For other minimum versions, inspect the available sets and explain that no matching wrapper is provided. Plain
`ecs.php` and `rector.php` do not select a migration level. Inspect actual configuration files: an ECS entrypoint returns a builder; the Rector configuration returns a
closure that receives `RectorConfig`. Do not assume interchangeable wrapper shapes.

Preserve consumer paths and justified skips. Run non-mutating checks first; ECS/Rector fix commands change files.
Do not raise the language target merely to clear a finding. Verify installed ECS/Rector compatibility and the selected
configuration with the consumer's tests.

## Verify the task

Run the relevant existing package checks and independent assertions for the selected operation. Read `composer.json`
scripts before executing them: fixers, installers and cleanup commands can mutate files. Use isolated synthetic inputs
for side-effecting behavior. Report the PHP version and missing dependencies. Distinguish native skill discovery,
activation, generated snippets and executed functional results; none substitutes for the others.
