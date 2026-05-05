<?php

declare(strict_types=1);

/**
 * ECS configuration targeting PHP `8.4` syntax.
 *
 * Adds the `@PHP84Migration` PHP-CS-Fixer set on top of the shared base configuration.
 *
 * ```php
 * <?php
 *
 * declare(strict_types=1);
 *
 * /** @var \Symplify\EasyCodingStandard\Configuration\ECSConfigBuilder $builder *\/
 * $builder = require __DIR__ . '/vendor/php-forge/coding-standard/src/ecs-84.php';
 *
 * return $builder->withPaths([__DIR__ . '/src', __DIR__ . '/tests']);
 * ```
 *
 * @var \Symplify\EasyCodingStandard\Configuration\ECSConfigBuilder $builder
 */
$builder = require __DIR__ . '/ecs.php';

return $builder->withPhpCsFixerSets(php84Migration: true);
