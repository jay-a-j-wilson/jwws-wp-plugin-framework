<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Tests\Integration;

use InvalidArgumentException;
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
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Standard_Name::class,
            actual: Standard_Name::of(
                path_info: Path_Info::of(path: 'dir/file.ext'),
            ),
        );
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => arg $arg throws e
     */
    public function throw(string $arg): void {
        $this->expectException(exception: InvalidArgumentException::class);
        Standard_Name::of(
            path_info: Path_Info::of(path: $arg),
        );
    }

    public static function throw_data_provider(): iterable {
        yield 'empty' => [''];

        yield 'no filename' => ['.ext'];

        yield 'in dir, no filename' => ['dir/.ext'];

        yield 'in nested dir, no filename' => ['dir/sub_dir/.ext'];
    }
}
