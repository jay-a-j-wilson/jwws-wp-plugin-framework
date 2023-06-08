<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Subclasses\PHP_Factory\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Subclasses\PHP_File\PHP_File;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Sub_Value_Objects\File\Subclasses\PHP_File\PHP_File
 *
 * @internal
 */
final class Of extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: $_dataName arg $arg returns $expected
     */
    public function pass(string $arg, string $expected): void {
        self::assertEquals(
            expected: $expected,
            actual: PHP_File::of(path: $arg)->value,
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
