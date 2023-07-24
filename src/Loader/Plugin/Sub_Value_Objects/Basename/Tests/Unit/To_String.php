<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Tests\Unit;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Basename;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Basename
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
     * @testdox pass[$_dataName] => $arg returns 'dir/file.php'
     */
    public function pass(string $arg): void {
        self::assertSame(
            expected: 'dir/file.php',
            actual: Basename::of(basename: $arg)->__toString(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => ['dir/file.php'];

        yield 'non php ext' => ['dir/file.txt'];

        yield 'no ext' => ['dir/file'];

        yield 'two folders' => ['sup_dir/dir/file.php'];
    }
}
