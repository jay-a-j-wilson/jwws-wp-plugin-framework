<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Value_Objects\Basename\Tests\Unit;

use JWWS\WPPF\Loader\Plugin\Value_Objects\Basename\Basename;
use PHPUnit\Framework\TestCase;

/**
 * @covers Basename
 */
final class Of extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: $_dataName arg $arg returns "dir/file.php"
     */
    public function pass(string $arg): void {
        $this->assertEquals(
            expected: 'dir/file.php',
            actual: Basename::of(basename: $arg)->value,
        );
    }

    public static function pass_data_provider(): array {
        return [
            'basic'       => ['dir/file.php'],
            'non php ext' => ['dir/file.txt'],
            'no ext'      => ['dir/file'],
            'two folders' => ['sup_dir/dir/file.php'],
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
        Basename::of(basename: $arg);
    }

    public static function throw_data_provider(): array {
        return [
            'empty'               => [''],
            'no dir'              => ['file.ext'],
            'no filename'         => ['dir/.ext'],
            'no dir, no filename' => ['.ext'],
        ];
    }
}
