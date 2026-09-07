<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\FunctionNotation\NullableTypeDeclarationForDefaultNullValueFixer;
use PhpCsFixer\Fixer\Operator\NewExpressionParenthesesFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

/**
 * Non-risky PHP 8.4 migration rules, including all earlier migration rules.
 */
return ECSConfig::configure()
    ->withSets(
        [__DIR__ . '/php-82.php'],
    )
    ->withRules(
        [
            NewExpressionParenthesesFixer::class,
            NullableTypeDeclarationForDefaultNullValueFixer::class,
        ],
    );
