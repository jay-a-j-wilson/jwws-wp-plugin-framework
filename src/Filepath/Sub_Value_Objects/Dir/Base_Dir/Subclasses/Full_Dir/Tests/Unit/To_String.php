<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Full_Dir\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Full_Dir\Full_Dir;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Full_Dir\Full_Dir
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
     * @testdox pass[$_dataName] arg $arg returns $expected
     */
    public function pass(string $arg, string $expected): void {
        self::assertSame(
            expected: $expected,
            actual: Full_Dir::of(path: $arg)->__toString(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => [
            'dir/file.ext',
            'dir/',
        ];

        yield 'no filename' => [
            'dir/.ext',
            'dir/',
        ];

        yield 'in dir' => [
            'dir/sub_dir/file.ext',
            'dir/sub_dir/',
        ];

        yield 'in dir, no filename' => [
            'dir/sub_dir/dir/.ext',
            'dir/sub_dir/dir/',
        ];

        yield 'in dir, no filename, no ext' => [
            'dir/sub_dir/dir/',
            'dir/sub_dir/',
        ];

        yield 'in dir, no filename, no ext, no forward slash' => [
            'dir/sub_dir/dir',
            'dir/sub_dir/',
        ];
    }
}
