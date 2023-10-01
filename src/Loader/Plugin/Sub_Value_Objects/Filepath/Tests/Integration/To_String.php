<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Tests\Integration;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Factory\Basename_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Dir;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Filepath;
use WP_UnitTestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Filepath
 *
 * @internal
 *
 * @small
 */
final class To_String extends WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg returns ".../wp-content/plugins/dir/file.php"
     */
    public function pass(string $arg): void {
        self::assertStringEndsWith(
            suffix: '/wp-content/plugins/dir/file.php',
            string: Filepath::of(
                dir: Dir::new_instance(),
                factory: Basename_Factory::of(path: $arg),
            )
                ->__toString(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => ['dir/file.php'];

        yield 'non php ext' => ['dir/file.txt'];

        yield 'no ext' => ['dir/file'];

        yield 'nested dir' => ['sup_dir/dir/file.php'];
    }
}
