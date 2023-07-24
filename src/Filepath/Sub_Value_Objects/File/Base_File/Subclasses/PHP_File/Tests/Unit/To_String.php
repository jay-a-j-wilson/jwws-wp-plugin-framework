<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\PHP_File;
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
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg returns $expected
     */
    public function pass(string $arg, string $expected): void {
        self::assertSame(
            expected: $expected,
            actual: PHP_File::of(path: $arg)->__toString(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => [
            'filename.php',
            'filename.php',
        ];

        yield 'no ext' => [
            'filename',
            'filename.php',
        ];

        yield 'dif ext' => [
            'filename.css',
            'filename.php',
        ];

        yield 'nested dir' => [
            'dir/sub_dir/filename.php',
            'filename.php',
        ];

        yield 'nested dir, dif ext' => [
            'dir/sub_dir/filename.css',
            'filename.php',
        ];

        yield 'nested dir, double ext' => [
            'dir/sub_dir/filename.html.php',
            'filename.html.php',
        ];
    }
}
