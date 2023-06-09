<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Tests\Integration;

use JWWS\WPPF\Filepath\{
    Sub_Value_Objects\Dir\Subclasses\Full_Dir\Full_Dir,
    Sub_Value_Objects\File\Subclasses\PHP_File\PHP_File,
    Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath
 *
 * @internal
 */
final class Of extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg exists.
     */
    public function pass(string $arg): void {
        $this->expectNotToPerformAssertions();
        $path = __DIR__ . "/test_files/{$arg}";
        Unconfirmed_Filepath::of(
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
     * @testdox "$path" not exists.
     *
     * @dataProvider throw_data_provider
     */
    // public function throw(string $path): void {
    //     $this->expectException(exception: \InvalidArgumentException::class);
    //     $full_path = __DIR__ . "/test_files/{$path}";
    //     Unconfirmed_Filepath::of(
    //         directory: Entire_Directory::of(path: $full_path),
    //         file: PHP_Factory::of(path: $full_path),
    //     );
    // }

    // public static function throw_data_provider(): array {
    //     return [
    //         ['folder/.txt'],
    //         ['.txt'],
    //     ];
    // }
}
