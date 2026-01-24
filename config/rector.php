<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\BooleanAnd\SimplifyEmptyArrayCheckRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\Class_\TypedPropertyFromCreateMockAssignRector;

/**
 * Shared Rector configuration.
 *
 * This file intentionally contains no project-specific paths.
 * Consumer repositories should provide their own wrapper rector.php
 * and set paths there.
 */
return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->parallel();

    $rectorConfig->importNames();

    $rectorConfig->sets(
        [
            SetList::PHP_81,
            LevelSetList::UP_TO_PHP_81,
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
