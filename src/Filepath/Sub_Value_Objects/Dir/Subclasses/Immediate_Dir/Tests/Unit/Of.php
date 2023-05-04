<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Subclasses\Immediate_Dir\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Subclasses\Immediate_Dir\Immediate_Dir;
use PHPUnit\Framework\TestCase;

/**
 * @covers Immediate_Dir
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
            actual: Immediate_Dir::of(path: $arg),
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
            'nested dir' => [
                'dir/sub_dir/file.ext',
                'sub_dir/',
            ],
            'nested dir, no filename' => [
                'dir/sub_dir/sub_sub_dir/.ext',
                'sub_sub_dir/',
            ],
            'nested dir, no filename, no ext' => [
                'dir/sub_dir/sub_sub_dir/',
                'sub_dir/',
            ],
            'nested dir, no filename, no ext, no forward slash' => [
                'dir/sub_dir/sub_sub_dir',
                'sub_dir/',
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
    public function throw(mixed $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Immediate_Dir::of(path: $arg);
    }

    public static function throw_data_provider(): array {
        return [
            'empty'               => [''],
            'no dir'              => ['file.php'],
            'no dir, no filename' => ['.php'],
            'no dir, no ext'      => ['file.'],
            'no filename, no ext' => ['dir'],
        ];
    }
}
