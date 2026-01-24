<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

/**
 * Prefer importing vendor/php-forge/coding-standard/config/rector.php in consumer repositories.
 */
return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/config/rector.php');

    $rectorConfig->paths(
        [__DIR__ . '/config'],
    );
};
