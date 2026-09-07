<?php

declare(strict_types=1);

/**
 * ECS configuration targeting PHP `8.1` syntax.
 *
 * Adds explicit ECS rules equivalent to the `@PHP81Migration` PHP-CS-Fixer set.
 *
 * @var \Symplify\EasyCodingStandard\Configuration\ECSConfigBuilder
 */
$builder = require __DIR__ . '/ecs.php';

return $builder->withSets(
    [__DIR__ . '/sets/php-81.php'],
);
