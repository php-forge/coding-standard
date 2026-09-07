<?php

declare(strict_types=1);

/**
 * ECS configuration targeting PHP `8.4` syntax.
 *
 * Adds explicit ECS rules equivalent to the `@PHP84Migration` PHP-CS-Fixer set.
 *
 * @var \Symplify\EasyCodingStandard\Configuration\ECSConfigBuilder
 */
$builder = require __DIR__ . '/ecs.php';

return $builder->withSets(
    [__DIR__ . '/sets/php-84.php'],
);
