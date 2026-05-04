<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ClassNotation\{ClassDefinitionFixer, OrderedClassElementsFixer, OrderedTraitsFixer};
use PhpCsFixer\Fixer\Import\{NoUnusedImportsFixer, OrderedImportsFixer};
use PhpCsFixer\Fixer\LanguageConstruct\NullableTypeDeclarationFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTypesOrderFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitTestCaseStaticMethodCallsFixer;
use PhpCsFixer\Fixer\Strict\{DeclareStrictTypesFixer, StrictComparisonFixer, StrictParamFixer};
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

/**
 * Shared base ECS configuration.
 *
 * This file intentionally contains no project-specific paths and no PHP-version migration set. Consumer repositories
 * should require either this file (no migration) or one of the version-pinned wrappers (`ecs-81.php`, `ecs-82.php`,
 * `ecs-83.php`, `ecs-84.php`) and set their own paths.
 *
 * The "strict" prepared set is intentionally NOT used: it was deprecated in Symplify ECS `13` with guidance to enable
 * the underlying fixers explicitly so the consumer keeps direct control over the strict-typing surface. The three
 * fixers it used to bundle (`DeclareStrictTypesFixer`, `StrictComparisonFixer`, `StrictParamFixer`) are added as
 * individual rules below to preserve behavior.
 */
return ECSConfig::configure()
    ->withConfiguredRule(
        ClassDefinitionFixer::class,
        [
            'space_before_parenthesis' => true,
        ],
    )
    ->withConfiguredRule(
        NullableTypeDeclarationFixer::class,
        [
            'syntax' => 'union',
        ],
    )
    ->withConfiguredRule(
        OrderedClassElementsFixer::class,
        [
            'order' => [
                'use_trait',
                'constant_public',
                'constant_protected',
                'constant_private',
                'case',
                'property_public',
                'property_protected',
                'property_private',
                'construct',
                'destruct',
                'magic',
                'method_public_abstract',
                'method_protected_abstract',
                'method_public',
                'method_protected',
                'method_private',
            ],
            'sort_algorithm' => 'alpha',
        ],
    )
    ->withConfiguredRule(
        OrderedImportsFixer::class,
        [
            'imports_order' => [
                'class',
                'function',
                'const',
            ],
            'sort_algorithm' => 'alpha',
        ],
    )
    ->withConfiguredRule(
        PhpdocTypesOrderFixer::class,
        [
            'sort_algorithm' => 'none',
            'null_adjustment' => 'always_last',
        ],
    )
    ->withConfiguredRule(
        PhpUnitTestCaseStaticMethodCallsFixer::class,
        [
            'call_type' => 'self',
        ],
    )
    ->withFileExtensions(['php'])
    ->withPhpCsFixerSets(perCS30: true)
    ->withPreparedSets(
        cleanCode: true,
        comments: true,
        docblocks: true,
        namespaces: true,
    )
    ->withRules(
        [
            DeclareStrictTypesFixer::class,
            NoUnusedImportsFixer::class,
            OrderedTraitsFixer::class,
            SingleQuoteFixer::class,
            StrictComparisonFixer::class,
            StrictParamFixer::class,
        ],
    );
