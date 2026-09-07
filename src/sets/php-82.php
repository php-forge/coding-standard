<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\StringNotation\SimpleToComplexStringVariableFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

/**
 * Non-risky PHP 8.2 migration rules, including all earlier migration rules.
 */
return ECSConfig::configure()
    ->withSets(
        [__DIR__ . '/php-81.php'],
    )
    ->withRules(
        [SimpleToComplexStringVariableFixer::class],
    );
