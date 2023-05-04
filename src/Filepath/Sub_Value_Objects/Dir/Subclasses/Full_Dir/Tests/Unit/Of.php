<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Subclasses\Entire_Dir\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Subclasses\Full_Dir\Full_Dir;
use PHPUnit\Framework\TestCase;

/**
 * @covers Full_Dir
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
        $this->assertEquals(
            expected: $expected,
            actual: Full_Dir::of(path: $arg),
        );
    }

    public static function pass_data_provider(): array {
        return [
            'basic' => [
                'dir/file.ext',
                'dir/',
            ],
            'no filename' => [
                'dir/.ext',
                'dir/',
            ],
            'in dir' => [
                'dir/sub_dir/file.ext',
                'dir/sub_dir/',
            ],
            'in dir, no filename' => [
                'dir/sub_dir/dir/.ext',
                'dir/sub_dir/dir/',
            ],
            'in dir, no filename, no ext' => [
                'dir/sub_dir/dir/',
                'dir/sub_dir/',
            ],
            'in dir, no filename, no ext, no forward slash' => [
                'dir/sub_dir/dir',
                'dir/sub_dir/',
            ],
        ];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw: $_dataName arg $arg throws e
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Full_Dir::of(path: $arg);
    }

    public static function throw_data_provider(): array {
        return [
            'empty'               => [''],
            'no dir'              => ['file.php'],
            'no dir, no ext'      => ['file.'],
            'no dir, no filename' => ['.php'],
        ];
    }
}
