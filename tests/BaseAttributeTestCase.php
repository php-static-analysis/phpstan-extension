<?php

namespace test\PhpStaticAnalysis\PHPStanExtension;

use PHPStan\Analyser\Analyser;
use PHPStan\Analyser\Error;
use PHPStan\File\FileHelper;
use PHPStan\Testing\PHPStanTestCase;
use PhpStaticAnalysis\Attributes\Param;
use PhpStaticAnalysis\Attributes\Returns;

class BaseAttributeTestCase extends PHPStanTestCase
{
    #[Returns('Error[]')]
    protected function analyse(string $file): array
    {
        $file = $this->getFileHelper()->normalizePath($file);
        $analyser = self::getContainer()->getByType(Analyser::class);
        $fileHelper = self::getContainer()->getByType(FileHelper::class);
        $errors = $analyser->analyse([$file], null, null, true)->getErrors();
        foreach ($errors as $error) {
            $this->assertSame($fileHelper->normalizePath($file), $error->getFilePath());
        }

        return $errors;
    }

    #[Param(
        errors: 'Error[]',
        expectedErrors: 'array<string,int>',
    )]
    protected function checkExpectedErrors(
        array $errors,
        array $expectedErrors
    ): void {
        $this->assertCount(count($expectedErrors), $errors);

        $errorNum = 0;
        foreach ($expectedErrors as $error => $line) {
            $this->assertSame($error, $errors[$errorNum]->getMessage());
            $this->assertSame($line, $errors[$errorNum]->getLine());
            $errorNum++;
        }
    }

    public static function getAdditionalConfigFiles(): array
    {
        return [
            __DIR__ . '/../extension.neon',
        ];
    }
}
