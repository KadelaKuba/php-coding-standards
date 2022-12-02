<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ClassNotation\ClassAttributesSeparationFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\FunctionNotation\FunctionTypehintSpaceFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitTestCaseStaticMethodCallsFixer;
use PhpCsFixer\Fixer\Semicolon\SpaceAfterSemicolonFixer;
use PhpCsFixer\Fixer\Whitespace\ArrayIndentationFixer;
use SlevomatCodingStandard\Sniffs\Classes\BackedEnumTypeSpacingSniff;
use SlevomatCodingStandard\Sniffs\Classes\ClassConstantVisibilitySniff;
use SlevomatCodingStandard\Sniffs\Classes\PropertyDeclarationSniff;
use SlevomatCodingStandard\Sniffs\Classes\RequireMultiLineMethodSignatureSniff;
use SlevomatCodingStandard\Sniffs\ControlStructures\JumpStatementsSpacingSniff;
use SlevomatCodingStandard\Sniffs\Variables\UselessVariableSniff;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->sets([
        __DIR__ . 'ecs-default.php'
    ]);

    // ECS - common/array
    $ecsConfig->rules([
        TrailingCommaInMultilineFixer::class,
        ArrayIndentationFixer::class
    ]);

    // ECS - common/spaces
    $ecsConfig->rules([
        FunctionTypehintSpaceFixer::class,
        SpaceAfterSemicolonFixer::class
    ]);

    $ecsConfig->ruleWithConfiguration(
        ClassAttributesSeparationFixer::class,
        ['elements' => ['property' => 'one', 'method' => 'one']]
    );

    // Slevomat coding standards
    // @see https://github.com/slevomat/coding-standard#alphabetical-list-of-sniffs
    $ecsConfig->rules([
        BackedEnumTypeSpacingSniff::class,
        ClassConstantVisibilitySniff::class,
        PropertyDeclarationSniff::class,
        RequireMultiLineMethodSignatureSniff::class,
        UselessVariableSniff::class,
    ]);

    $ecsConfig->ruleWithConfiguration(
        JumpStatementsSpacingSniff ::class,
        ['jumpStatements' => ['return']]
    );

    // PHPCS fixers
    $ecsConfig->ruleWithConfiguration(
        PhpUnitTestCaseStaticMethodCallsFixer::class,
        ['call_type' => 'self']
    );
};
