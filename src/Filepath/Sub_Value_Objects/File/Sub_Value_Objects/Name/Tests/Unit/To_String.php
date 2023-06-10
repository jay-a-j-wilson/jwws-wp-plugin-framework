<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\Name\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name
 *
 * @internal
 */
final class To_String extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg returns "file"
     */
    public function pass(mixed $arg): void {
        self::assertSame(
            expected: 'file',
            actual: Name::of(path: $arg)->__toString(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => ['file.php'];

        yield 'no ext' => ['file'];

        yield 'in dir' => ['dir/file.php'];

        yield 'in nested dir' => ['dir/sub_dir/file.php'];
    }
}
