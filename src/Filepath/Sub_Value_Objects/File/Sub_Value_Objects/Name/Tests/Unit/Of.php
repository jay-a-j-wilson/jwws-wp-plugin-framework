<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name;
use PHPUnit\Framework\TestCase;

/**
 * @covers Name
 */
final class Of extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: $_dataName arg $arg returns "file"
     */
    public function pass(mixed $arg): void {
        $this->assertEquals(
            expected: 'file',
            actual: Name::of(path: $arg),
        );
    }

    public static function pass_data_provider(): array {
        return [
            'basic'         => ['file.php'],
            'no ext'        => ['file'],
            'in dir'        => ['dir/file.php'],
            'in nested dir' => ['dir/sub_dir/file.php'],
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
        Name::of(path: $arg);
    }

    public static function throw_data_provider(): array {
        return [
            'empty'                      => [''],
            'no filename'                => ['.ext'],
            'in dir, no filename'        => ['dir/.ext'],
            'in nested dir, no filename' => ['dir/sub_dir/.ext'],
        ];
    }
}
