<?php

declare(strict_types=1);

/**
 * Prefer importing vendor/php-forge/coding-standard/config/ecs.php in consumer repositories.
 *
 * @var \Symplify\EasyCodingStandard\Configuration\ECSConfigBuilder $ecsConfigBuilder
 */
$ecsConfigBuilder = require __DIR__ . '/config/ecs.php';

return $ecsConfigBuilder->withPaths(
    [
        __DIR__ . '/config',
    ],
);
