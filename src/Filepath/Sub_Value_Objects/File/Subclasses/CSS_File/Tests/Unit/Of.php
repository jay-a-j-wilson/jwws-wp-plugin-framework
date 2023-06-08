<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Subclasses\CSS_File\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Subclasses\CSS_File\CSS_File;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Sub_Value_Objects\File\Subclasses\CSS_File\CSS_File
 *
 * @internal
 */
final class Of extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass: $_dataName arg $arg returns "filename.css"
     */
    public function pass(string $arg): void {
        self::assertEquals(
            expected: 'filename.css',
            actual: CSS_File::of(path: $arg)->value,
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => ['filename.css'];

        yield 'no ext' => ['filename'];

        yield 'nested dir' => ['dir/sub_dir/filename.css'];

        yield 'nested dir, dif ext' => ['dir/sub_dir/filename.php'];
    }
}
