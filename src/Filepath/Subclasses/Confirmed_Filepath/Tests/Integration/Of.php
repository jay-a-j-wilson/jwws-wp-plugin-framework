<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Tests\Integration;

use JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Full_Dir\Full_Dir;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\PHP_File;
use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Confirmed_Filepath;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Confirmed_Filepath
 *
 * @internal
 *
 * @small
 */
final class Of extends TestCase {
    private function full_path(string $path): string {
        return __DIR__ . "/test_files/{$path}";
    }

    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg exists.
     */
    public function pass(string $arg): void {
        $this->expectNotToPerformAssertions();

        $path = $this->full_path(path: $arg);

        Confirmed_Filepath::of(
            dir: Full_Dir::of(path: $path),
            file: PHP_File::of(path: $path),
        );
    }

    public static function pass_data_provider(): iterable {
        yield ['folder/file_1.php'];

        yield ['folder/file_1.txt'];

        yield ['file_1.txt'];

        yield ['file_2.txt'];

        yield ['file_1.php'];

        yield ['file_1'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => arg $arg not exist.
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);

        $path = $this->full_path(path: $arg);

        Confirmed_Filepath::of(
            dir: Full_Dir::of(path: $path),
            file: PHP_File::of(path: $path),
        );
    }

    public static function throw_data_provider(): iterable {
        yield ['folder/foo.txt'];

        yield ['foo.txt'];

        yield ['bar.txt'];
    }
}
