<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Tests\Integration;

use JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Full_Dir\Full_Dir;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\Factory\Factory;
use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath
 *
 * @internal
 *
 * @small
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
            file: Factory::of(path: $path)->create(),
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
}
