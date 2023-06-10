<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Tests\Integration;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Filepath;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Filepath
 *
 * @internal
 */
final class To_String extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg returns ".../wp-content/plugins/dir/filename.php"
     */
    public function pass(string $arg): void {
        self::assertStringEndsWith(
            suffix: '/wp-content/plugins/dir/filename.php',
            string: Filepath::of(basename: $arg)->__toString(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => ['dir/filename.php'];

        yield 'non php ext' => ['dir/filename.txt'];

        yield 'no ext' => ['dir/filename'];

        yield 'nested dir' => ['sup_dir/dir/filename.php'];
    }
}
