<?php

declare(strict_types=1);

/**
 * ECS configuration targeting PHP `8.2` syntax.
 *
 * Adds explicit ECS rules equivalent to the `@PHP82Migration` PHP-CS-Fixer set.
 *
 * @var \Symplify\EasyCodingStandard\Configuration\ECSConfigBuilder
 */
$builder = require __DIR__ . '/ecs.php';

return $builder->withSets(
    [__DIR__ . '/sets/php-82.php'],
);
