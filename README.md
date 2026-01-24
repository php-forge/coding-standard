<!-- markdownlint-disable MD041 -->
<p align="center">
    <a href="https://github.com/php-forge/coding-standard" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/103309199?s%25253D400%252526u%25253Dca3561c692f53ed7eb290d3bb226a2828741606f%252526v%25253D4" height="150px" alt="PHP Forge">
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
composer require php-forge/coding-standard:^0.1 --dev
```

## Quick start

This package provides shared configuration files under `vendor/php-forge/coding-standard/config/`:

- `config/ecs.php` (shared ECS rules, no paths)
- `config/rector.php` (shared Rector rules, no paths)

Consumer repositories should create wrapper config files at the repository root.
Wrappers define the paths for that repository and import the shared configuration.

### Generic repository

#### ECS (ecs.php)

Create `ecs.php` in your repository root:

```php
<?php

declare(strict_types=1);

/** @var \Symplify\EasyCodingStandard\Configuration\ECSConfigBuilder $ecsConfigBuilder */
$ecsConfigBuilder = require __DIR__ . '/vendor/php-forge/coding-standard/config/ecs.php';

return $ecsConfigBuilder->withPaths(
    [
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ],
);
```

To override or skip rules locally, apply changes after requiring the shared config:

```php
<?php

declare(strict_types=1);

/** @var \Symplify\EasyCodingStandard\Configuration\ECSConfigBuilder $ecsConfigBuilder */
$ecsConfigBuilder = require __DIR__ . '/vendor/php-forge/coding-standard/config/ecs.php';

return $ecsConfigBuilder
    ->withPaths(
        [
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ],
    )
    ->withSkip(
        [
            // add project-specific skips here.
        ],
    );
```

#### Rector (rector.php)

Create `rector.php` in your repository root:

```php
<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/vendor/php-forge/coding-standard/config/rector.php');

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

### Yii2 repositories

If you need framework-specific rules (Yii2), keep them in a separate config file (or a separate package)
and import it after the base configuration. Do not mix Yii2-specific rules into the generic base.

Example (Rector):

```php
<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/vendor/php-forge/coding-standard/config/rector.php');
    $rectorConfig->import(__DIR__ . '/rector-yii2.php');

    $rectorConfig->paths(
        [
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ],
    );
};
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

- [Testing Guide](docs/testing.md)
- [Development Guide](docs/development.md)

## Package information

[![PHP](https://img.shields.io/badge/%3E%3D8.1-777BB4.svg?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/releases/8.1/en.php)
[![Latest Stable Version](https://img.shields.io/packagist/v/php-forge/coding-standard.svg?style=for-the-badge&logo=packagist&logoColor=white&label=Stable)](https://packagist.org/packages/php-forge/coding-standard)
[![Total Downloads](https://img.shields.io/packagist/dt/php-forge/coding-standard.svg?style=for-the-badge&logo=composer&logoColor=white&label=Downloads)](https://packagist.org/packages/php-forge/coding-standard)

## Quality code

[![Super-Linter](https://img.shields.io/github/actions/workflow/status/php-forge/coding-standard/linter.yml?style=for-the-badge&label=Super-Linter&logo=github)](https://github.com/php-forge/coding-standard/actions/workflows/linter.yml)
[![StyleCI](https://img.shields.io/badge/StyleCI-Passed-44CC11.svg?style=for-the-badge&logo=github&logoColor=white)](https://github.styleci.io/repos/1141292628?branch=main)

## Our social networks

[![Follow on X](https://img.shields.io/badge/-Follow%20on%20X-1DA1F2.svg?style=for-the-badge&logo=x&logoColor=white&labelColor=000000)](https://x.com/Terabytesoftw)

## License

[![License](https://img.shields.io/badge/License-BSD--3--Clause-brightgreen.svg?style=for-the-badge&logo=opensourceinitiative&logoColor=white&labelColor=555555)](LICENSE)
