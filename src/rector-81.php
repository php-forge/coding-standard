<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

/**
 * Rector configuration targeting PHP `8.1` syntax.
 *
 * Layers `LevelSetList::UP_TO_PHP_81` on top of the shared base configuration.
 *
 * ```php
 * <?php
 *
 * declare(strict_types=1);
 *
 * use Rector\Config\RectorConfig;
 *
 * return static function (RectorConfig $rectorConfig): void {
 *     $rectorConfig->import(__DIR__ . '/vendor/php-forge/coding-standard/src/rector-81.php');
 *     $rectorConfig->paths([__DIR__ . '/src', __DIR__ . '/tests']);
 * };
 * ```
 */
return static function (RectorConfig $rectorConfig): void {
    (require __DIR__ . '/rector.php')($rectorConfig);

    $rectorConfig->sets(
        [
            LevelSetList::UP_TO_PHP_81,
        ],
    );
};
