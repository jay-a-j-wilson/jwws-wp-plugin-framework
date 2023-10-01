<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\PHP_File;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\PHP_File
 *
 * @internal
 *
 * @small
 */
final class To_String extends TestCase {
    /**
     * ! Fix nested stubbing
     *
     * @xtest
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg returns $expected
     */
    public function pass(string $arg, string $expected): void {
        $stub = $this->createStub(originalClassName: Name::class);
        $stub
            ->method('__toString')
            ->willReturn(value: $arg)
        ;

        self::assertSame(
            expected: $expected,
            actual: PHP_File::of(path: $stub)->__toString(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => [
            'filename',
            'filename.php',
        ];
    }
}
