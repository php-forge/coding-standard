<?php

declare(strict_types=1);

/**
 * ECS configuration targeting PHP `8.3` syntax.
 *
 * Adds the `@PHP83Migration` PHP-CS-Fixer set on top of the shared base configuration.
 *
 * ```php
 * <?php
 *
 * declare(strict_types=1);
 *
 * /** @var \Symplify\EasyCodingStandard\Configuration\ECSConfigBuilder $builder *\/
 * $builder = require __DIR__ . '/vendor/php-forge/coding-standard/config/ecs-83.php';
 *
 * return $builder->withPaths([__DIR__ . '/src', __DIR__ . '/tests']);
 * ```
 *
 * @var \Symplify\EasyCodingStandard\Configuration\ECSConfigBuilder $builder
 */
$builder = require __DIR__ . '/ecs.php';

return $builder->withPhpCsFixerSets(php83Migration: true);
