<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name
 *
 * @internal
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
        self::assertEquals(
            expected: 'file',
            actual: Name::of(path: $arg),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => ['file.php'];

        yield 'no ext' => ['file'];

        yield 'in dir' => ['dir/file.php'];

        yield 'in nested dir' => ['dir/sub_dir/file.php'];
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

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];

        yield 'no filename' => ['.ext'];

        yield 'in dir, no filename' => ['dir/.ext'];

        yield 'in nested dir, no filename' => ['dir/sub_dir/.ext'];
    }
}
