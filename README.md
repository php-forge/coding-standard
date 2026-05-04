<!-- markdownlint-disable MD041 -->
<p align="center">
    <a href="https://github.com/php-forge/coding-standard" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/103309199?s%25253D400%252526u%25253Dca3561c692f53ed7eb290d3bb226a2828741606f%252526v%25253D4" width="25%" alt="PHP Forge">
    </a>
    <h1 align="center">Coding standard</h1>
    <br>
</p>
<!-- markdownlint-enable MD041 -->

<p align="center">
    <strong>Centralized ECS and Rector configuration for PHP projects</strong><br>
    <em>Share one set of rules across multiple repositories via Composer.</em>
</p>

## Features

<picture>
    <source media="(min-width: 768px)" srcset="./docs/svgs/features.svg">
    <img src="./docs/svgs/features-mobile.svg" alt="Feature Overview" style="width: 100%;">
</picture>

## Installation

```bash
composer require php-forge/coding-standard:^0.2 --dev
```

## Configuration files

This package ships shared ECS and Rector configurations under
`vendor/php-forge/coding-standard/src/`:

| File                | Purpose                                                 |
| ------------------- | ------------------------------------------------------- |
| `src/ecs.php`       | Shared ECS base rules, no PHP migration set             |
| `src/ecs-81.php`    | Base + `@PHP81Migration` PHP-CS-Fixer set               |
| `src/ecs-82.php`    | Base + `@PHP82Migration`                                |
| `src/ecs-83.php`    | Base + `@PHP83Migration`                                |
| `src/ecs-84.php`    | Base + `@PHP84Migration`                                |
| `src/rector.php`    | Shared Rector base rules, no PHP level set              |
| `src/rector-81.php` | Base + `SetList::PHP_81` + `LevelSetList::UP_TO_PHP_81` |
| `src/rector-82.php` | Base + `SetList::PHP_82` + `LevelSetList::UP_TO_PHP_82` |
| `src/rector-83.php` | Base + `SetList::PHP_83` + `LevelSetList::UP_TO_PHP_83` |
| `src/rector-84.php` | Base + `SetList::PHP_84` + `LevelSetList::UP_TO_PHP_84` |

Pick the version that matches the **minimum** PHP your project supports; Rector upgrades code up to that level and
PHP-CS-Fixer enforces matching syntax. The plain `ecs.php` / `rector.php` apply no PHP-version migrations.

### ECS wrapper (ecs.php)

Create `ecs.php` in your repository root, requiring the version that matches
the minimum PHP your project supports (`ecs-83.php` for PHP 8.3, etc.):

```php
<?php

declare(strict_types=1);

/** @var \Symplify\EasyCodingStandard\Configuration\ECSConfigBuilder $ecsConfigBuilder */
$ecsConfigBuilder = require __DIR__ . '/vendor/php-forge/coding-standard/src/ecs-83.php';

return $ecsConfigBuilder
    ->withPaths(
        [
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ],
    )
    ->withSkip(
        [
            // project-specific skips here.
        ],
    );
```

### Rector wrapper (rector.php)

Create `rector.php` in your repository root, importing the version that
matches your minimum PHP target:

```php
<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/vendor/php-forge/coding-standard/src/rector-83.php');

    $rectorConfig->paths(
        [
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ],
    );

    // project-specific overrides can be added after the import.
    // $rectorConfig->skip([...]);
};
```

### Yii2-specific rules

For framework-specific rules, keep them in a separate config file (or a
separate package) and import it after the base configuration. Do not mix Yii2
rules into the generic base:

```php
<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/vendor/php-forge/coding-standard/src/rector.php');
    $rectorConfig->import(__DIR__ . '/rector-yii2.php');

    $rectorConfig->paths(
        [
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ],
    );
};
```

## Scaffolded distribution (optional)

This package is also a [`yii2-extensions/scaffold`](https://github.com/yii2-extensions/scaffold) provider.

When the scaffold plugin is installed and authorized, `composer install` distributes the canonical metadata and
super-linter configs into your repository root automatically; so the ECS / Rector wrappers above and the shared linter
rules stay in lock-step across every repository that opts in.

Opt in by adding the plugin and authorizing this package as a provider:

```bash
composer require yii2-extensions/scaffold:^0.1 --dev
```

```json
{
    "config": {
        "allow-plugins": {
            "yii2-extensions/scaffold": true
        }
    },
    "extra": {
        "scaffold": {
            "allowed-packages": [
                "php-forge/coding-standard"
            ]
        }
    }
}
```

On the next `composer install` / `composer update`, these files land in your repository root:

| File                                 | Mode       | Purpose                                                  |
| ------------------------------------ | ---------- | -------------------------------------------------------- |
| `.editorconfig`                      | `replace`  | Editor settings (UTF-8, LF, indent)                      |
| `.gitattributes`                     | `replace`  | Text/binary handling, archive excludes                   |
| `.gitignore`                         | `append`   | Common ignore patterns; project-specific lines preserved |
| `.styleci.yml`                       | `replace`  | StyleCI config (PSR-12 + risky)                          |
| `.ecrc`                              | `replace`  | editor-config-checker exclusions                         |
| `.prettierignore`                    | `replace`  | Paths Prettier should skip                               |
| `.prettierrc.json`                   | `replace`  | Prettier formatting rules                                |
| `.stylelintignore`                   | `replace`  | Paths stylelint should skip                              |
| `composer-require-checker.json`      | `preserve` | Composer require-checker whitelist (project-specific)    |
| `.github/linters/actionlint.yml`     | `replace`  | actionlint config for Super-Linter                       |
| `.github/linters/.codespellrc`       | `replace`  | codespell config                                         |
| `.github/linters/.gitleaks.toml`     | `replace`  | gitleaks config                                          |
| `.github/linters/.markdown-lint.yml` | `replace`  | markdownlint config                                      |
| `ecs.php`                            | `preserve` | ECS wrapper for the project root                         |
| `rector.php`                         | `preserve` | Rector wrapper for the project root                      |

Mode semantics:

- `replace`: lock-step with this package. Local edits trigger a warning and the file is skipped on update.
  Use `vendor/bin/scaffold reapply <file> --force` to re-sync.
- `append`: provider content is appended to the existing file. Project lines are never blown away.
- `preserve`: file is written once on first install and never overwritten.

The scaffolded `ecs.php` / `rector.php` ship with `83` as the default PHP target; switch to `81`, `82`, or `84` to match
your minimum PHP version. Mode `preserve` protects your edits across `composer update`.

### Scaffold commands

```bash
vendor/bin/scaffold status                       # show which files are synced/modified/missing
vendor/bin/scaffold diff <file>                  # diff between local and provider version
vendor/bin/scaffold reapply [<file>] [--force]   # re-apply provider content
vendor/bin/scaffold eject <file>                 # stop tracking a file (kept on disk)
```

## Composer scripts

Follow the same convention used across PHP Forge repositories:

```json
{
    "scripts": {
        "ecs": "./vendor/bin/ecs --fix",
        "rector": "./vendor/bin/rector process"
    }
}
```

## Documentation

- 📚 [Installation Guide](docs/installation.md)

## Package information

[![PHP](https://img.shields.io/badge/%3E%3D8.3-777BB4.svg?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/releases/8.3/en.php)
[![Latest Stable Version](https://img.shields.io/packagist/v/php-forge/coding-standard.svg?style=for-the-badge&logo=packagist&logoColor=white&label=Stable)](https://packagist.org/packages/php-forge/coding-standard)
[![Total Downloads](https://img.shields.io/packagist/dt/php-forge/coding-standard.svg?style=for-the-badge&logo=composer&logoColor=white&label=Downloads)](https://packagist.org/packages/php-forge/coding-standard)

## Quality code

[![Super-Linter](https://img.shields.io/github/actions/workflow/status/php-forge/coding-standard/linter.yml?style=for-the-badge&label=Super-Linter&logo=github)](https://github.com/php-forge/coding-standard/actions/workflows/linter.yml)
[![StyleCI](https://img.shields.io/badge/StyleCI-Passed-44CC11.svg?style=for-the-badge&logo=github&logoColor=white)](https://github.styleci.io/repos/1141292628?branch=main)

## Our social networks

[![Follow on X](https://img.shields.io/badge/-Follow%20on%20X-1DA1F2.svg?style=for-the-badge&logo=x&logoColor=white&labelColor=000000)](https://x.com/Terabytesoftw)

## License

[![License](https://img.shields.io/badge/License-BSD--3--Clause-brightgreen.svg?style=for-the-badge&logo=opensourceinitiative&logoColor=white&labelColor=555555)](LICENSE)
