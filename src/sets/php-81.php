<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ArrayNotation\{ArraySyntaxFixer, NoWhitespaceBeforeCommaInArrayFixer, NormalizeIndexBraceFixer};
use PhpCsFixer\Fixer\Basic\OctalNotationFixer;
use PhpCsFixer\Fixer\CastNotation\{NoUnsetCastFixer, ShortScalarCastFixer};
use PhpCsFixer\Fixer\ClassNotation\ModifierKeywordsFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer;
use PhpCsFixer\Fixer\ListNotation\ListSyntaxFixer;
use PhpCsFixer\Fixer\NamespaceNotation\CleanNamespaceFixer;
use PhpCsFixer\Fixer\Operator\{AssignNullCoalescingToCoalesceEqualFixer, TernaryToNullCoalescingFixer};
use PhpCsFixer\Fixer\Whitespace\HeredocIndentationFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

/**
 * Non-risky PHP 8.1 migration rules, matching PHP-CS-Fixer's `@PHP8x1Migration` set.
 *
 * The shared base configuration still excludes `HeredocIndentationFixer` when this set is used by a versioned wrapper.
 */
return ECSConfig::configure()
    ->withConfiguredRule(
        MethodArgumentSpaceFixer::class,
        ['after_heredoc' => true],
    )
    ->withConfiguredRule(
        NoWhitespaceBeforeCommaInArrayFixer::class,
        ['after_heredoc' => true],
    )
    ->withConfiguredRule(
        TrailingCommaInMultilineFixer::class,
        ['after_heredoc' => true],
    )
    ->withRules(
        [
            ArraySyntaxFixer::class,
            AssignNullCoalescingToCoalesceEqualFixer::class,
            CleanNamespaceFixer::class,
            HeredocIndentationFixer::class,
            ListSyntaxFixer::class,
            ModifierKeywordsFixer::class,
            NormalizeIndexBraceFixer::class,
            NoUnsetCastFixer::class,
            OctalNotationFixer::class,
            ShortScalarCastFixer::class,
            TernaryToNullCoalescingFixer::class,
        ],
    );
