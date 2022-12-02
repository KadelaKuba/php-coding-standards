<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Basic\NonPrintableCharacterFixer;
use PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer;
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->sets([
        SetList::PSR_12,
        SetList::NAMESPACES,
        SetList::STRICT,
    ]);

    // PHPCS fixers
    $ecsConfig->rule(NonPrintableCharacterFixer::class);

    // ECS - common/control structures
    $ecsConfig->rule(SingleQuoteFixer::class);

    $ecsConfig->ruleWithConfiguration(
        YodaStyleFixer::class,
        ['equal' => false, 'identical' => false, 'less_and_greater' => false]
    );
};
