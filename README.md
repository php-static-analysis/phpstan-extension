# PHP Static Analysis Attributes PHPStan Extension
[![Continuous Integration](https://github.com/php-static-analysis/phpstan-extension/workflows/All%20Tests/badge.svg)](https://github.com/php-static-analysis/phpstan-extension/actions)
[![Latest Stable Version](https://poser.pugx.org/php-static-analysis/phpstan-extension/v/stable)](https://packagist.org/packages/php-static-analysis/phpstan-extension)
[![PHP Version Require](http://poser.pugx.org/php-static-analysis/phpstan-extension/require/php)](https://packagist.org/packages/php-static-analysis/phpstan-extension)
[![License](https://poser.pugx.org/php-static-analysis/phpstan-extension/license)](https://github.com/php-static-analysis/phpstan-extension/blob/main/LICENSE)
[![Total Downloads](https://poser.pugx.org/php-static-analysis/phpstan-extension/downloads)](https://packagist.org/packages/php-static-analysis/phpstan-extension/stats)

Since the release of PHP 8.0 more and more libraries, frameworks and tools have been updated to use attributes instead of annotations in PHPDocs.

However, static analysis tools like PHPStan have not made this transition to attributes and they still rely on annotations in PHPDocs for a lot of their functionality.

This is a PHPStan extension that allows PHPStan to understand a new set of attributes that replace the PHPDoc annotations. These attributes are defined in [this repository](https://github.com/php-static-analysis/attributes)

## Example

In order to show how code would look with these attributes, we can look at the following example. This is how a class looks like with the current annotations:

```php
<?php

class ArrayAdder
{
    /** @var array<string>  */
    private array $result;

    /**
     * @param array<string> $array1
     * @param array<string> $array2
     * @return array<string>
     */
    public function addArrays(array $array1, array $array2): array
    {
        $this->result = $array1 + $array2;
        return $this->result;
    }
}
```

And this is how it would look like using the new attributes:

```php
<?php

use PhpStaticAnalysis\Attributes\Type;
use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;

class ArrayAdder
{
    #[Type('array<string>')]
    private array $result;

    #[Param(array1: 'array<string>')]
    #[Param(array2: 'array<string>')]
    #[Returns('array<string>')]
    public function addArrays(array $array1, array $array2): array
    {
        $this->array = $array1 + $array2;
        return $this->array;
    }
}
```

## Installation

First of all, to make the attributes available for your codebase use:

```
composer require php-static-analysis/attributes
```

To use this extension, require it in Composer:

```
composer require --dev php-static-analysis/phpstan-extension
```

If you also install [phpstan/extension-installer](https://github.com/phpstan/extension-installer) then you're all set!

<details>
  <summary>Manual installation</summary>

If you don't want to use `phpstan/extension-installer`, include `extension.neon` in your project's PHPStan config:

```
includes:
    - vendor/php-static-analysis/phpstan-extension/extension.neon
```
</details>

## Using the extension

This extension works by interacting with the parser that PHPStan uses to parse the code and replacing the new Attributes with PHPDoc annotations that PHPStan can understand. The functionality provided by the attribute is exactly the same as the one provided by the corresponding PHPDoc annotation.

These are the available attributes and their corresponding PHPDoc annotations:

| Attribute                                                                                   | PHPDoc Annotation |
|---------------------------------------------------------------------------------------------|-------------------|
| [IsReadOnly](https://github.com/php-static-analysis/attributes/blob/main/doc/IsReadOnly.md) | `@readonly`       |
| [Param](https://github.com/php-static-analysis/attributes/blob/main/doc/Param.md)           | `@param`          |
| [Returns](https://github.com/php-static-analysis/attributes/blob/main/doc/Returns.md)       | `@return`         |
| [Template](https://github.com/php-static-analysis/attributes/blob/main/doc/Template.md)     | `@template`       |
| [Type](https://github.com/php-static-analysis/attributes/blob/main/doc/Type.md)             | `@var`            |




