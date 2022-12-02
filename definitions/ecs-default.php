<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Basic\NonPrintableCharacterFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

$genericCodingStandards = static function (ECSConfig $ecsConfig): void {
    $ecsConfig->sets([
        SetList::PSR_12,
        SetList::COMMON
    ]);

    $ecsConfig->indentation(Option::INDENTATION_TAB);
    $ecsConfig->lineEnding('\n');
};

return static function (ECSConfig $ecsConfig) use (
	$genericCodingStandards
): void {
	$genericCodingStandards($ecsConfig);

    $ecsConfig->rule(NonPrintableCharacterFixer::class);
    $ecsConfig->ruleWithConfiguration(DeclareStrictTypesFixer::class, ['spacesCountAroundEqualsSign' => 0]);
};
