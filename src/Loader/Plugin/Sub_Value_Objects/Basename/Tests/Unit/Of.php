<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Tests\Unit;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Basename;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Basename
 *
 * @internal
 */
final class Of extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg returns $expected
     */
    public function pass(string $arg, string $expected): void {
        self::assertEquals(
            expected: $expected,
            actual: Basename::of(basename: $arg),
        );

        Basename::of(basename: $arg);
    }

    public static function pass_data_provider(): iterable {
        $expected = 'dir/file.php';

        yield 'basic' => ['dir/file.php', $expected];

        yield 'non php ext' => ['dir/file.txt', $expected];

        yield 'no ext' => ['dir/file', $expected];

        yield 'two folders' => ['sup_dir/dir/file.php', $expected];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Basename::of(basename: $arg);
    }

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];

        yield 'no dir' => ['file.ext'];

        yield 'no filename' => ['dir/.ext'];

        yield 'no dir, no filename' => ['.ext'];
    }
}
