# Installation guide

## System requirements

- [`PHP`](https://www.php.net/downloads) 8.3 or higher.
- [`Composer`](https://getcomposer.org/download/) for dependency management.

## Installation

### Method 1: Using [Composer](https://getcomposer.org/download/) (recommended)

Install the extension.

```bash
composer require php-forge/coding-standard:^0.2 --dev
```

### Method 2: Manual installation

Add to your `composer.json`.

```json
{
    "require-dev": {
        "php-forge/coding-standard": "^0.2"
    }
}
```

Then run.

```bash
composer update
```

## Next steps

- 📖 [Readme](../README.md)
