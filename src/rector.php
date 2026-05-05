<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\BooleanAnd\SimplifyEmptyArrayCheckRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\Class_\TypedPropertyFromCreateMockAssignRector;

/**
 * Shared base Rector configuration.
 *
 * This file intentionally contains no project-specific paths and no PHP version-level set. Consumer repositories should
 * import either this file (no version target) or one of the version-pinned wrappers (`rector-81.php`, `rector-82.php`,
 * `rector-83.php`, `rector-84.php`) and set their own paths.
 *
 * The version-pinned wrappers add the matching `SetList::PHP_XX` and `LevelSetList::UP_TO_PHP_XX` on top of this base.
 */
return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->parallel();
    $rectorConfig->importNames();
    $rectorConfig->sets(
        [
            SetList::TYPE_DECLARATION,
        ],
    );
    $rectorConfig->skip(
        [
            TypedPropertyFromCreateMockAssignRector::class,
        ],
    );
    $rectorConfig->rules(
        [
            SimplifyEmptyArrayCheckRector::class,
        ],
    );
};
