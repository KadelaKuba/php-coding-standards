# trayto.com | PHP Coding Standards

Common coding-standard utils, tools and rules used across our PHP projects in trayto.com

[symplify/easy-coding-standard (ECS)](https://github.com/symplify/easy-coding-standard) is used under the hood.
Follow configuration instructions there. Phar version is used so there should be no conflicts with projects dependencies.

[Parallel Lint](https://github.com/php-parallel-lint/PHP-Parallel-Lint) is available as well.

Further reading:
- [How to Migrate From PHP_CodeSniffer to EasyCodingStandard in 7 Steps](https://tomasvotruba.com/blog/2018/06/04/how-to-migrate-from-php-code-sniffer-to-easy-coding-standard/#comment-4086561141)
- [How to Migrate From PHP CS Fixer to EasyCodingStandard in 6 Steps](https://tomasvotruba.com/blog/2018/06/07/how-to-migrate-from-php-cs-fixer-to-easy-coding-standard/)

## Installation instructions

```
composer require --dev trayto-com/php-coding-standards
```

## Usage

You can use ECS directly in CLI but we do recommend to customise default rules:
```
vendor/bin/ecs check src tests --config vendor/trayto-com/php-coding-standards/definitions/ecs-default.php
```

Run PHP Parallel Lint:
```
vendor/bin/parallel-lint --exclude temp --exclude vendor .
```
*Hint:* do run linter before any other Standards check or Tests to fail fast in case of typo in your code

### Customise ECS rules and custom usage

Recommended is to create your own configuration for project and define cache folder for EasyCodingStandard as well.

 Create php file in your project root, for example `ecs.php`:
```php
<?php

declare(strict_types=1);

use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->import(TraytoSetList::TRAYTO_DEFAULT);

    $ecsConfig->rule(<NAME_OF_RULE>);

    $ecsConfig->cacheDirectory(__DIR__ . '/temp/ecs');
};
```

### Prepared set 
For all registered rules in prepared set lists check the related config files (for example `ecs-default.php`).

- **TraytoSetList::TRAYTO_DEFAULT**
  - default rules for project - includes mainly PSR12 standards and some basic rules


- **TraytoSetList::TRAYTO_EXTENDED**
  - more strict rules for code structure
