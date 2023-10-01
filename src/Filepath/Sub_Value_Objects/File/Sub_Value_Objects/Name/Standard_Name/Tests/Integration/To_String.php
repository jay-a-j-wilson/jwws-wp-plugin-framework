<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Tests\Integration;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Collabs\Path_Info\Path_Info;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Standard_Name;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Standard_Name
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
     * @testdox pass[$_dataName] => arg $arg returns "file"
     */
    public function pass(string $arg): void {
        self::assertSame(
            expected: 'file',
            actual: Standard_Name::of(
                path_info: Path_Info::of(path: $arg),
            )
                ->__toString(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => ['file.php'];

        yield 'no ext' => ['file'];

        yield 'in dir' => ['dir/file.php'];

        yield 'in nested dir' => ['dir/sub_dir/file.php'];
    }
}
