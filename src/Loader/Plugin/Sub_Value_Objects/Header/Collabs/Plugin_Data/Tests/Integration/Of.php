<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Plugin_Data\Tests\Integration;

use InvalidArgumentException;
use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory\Subclasses\PHP_Factory\PHP_Factory as Confirmed_Filepath_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Filepath\Factory\Filepath_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Plugin_Data\Plugin_Data;
use WP_UnitTestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Description_Header\Description_Header
 *
 * @internal
 *
 * @small
 */
final class Of extends WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(string $arg): void {
        self::assertInstanceOf(
            expected: Plugin_Data::class,
            actual: Plugin_Data::of(
                factory: Confirmed_Filepath_Factory::of(
                    path: Filepath_Factory::of(path: $arg)
                        ->create()
                        ->__toString(),
                )
            ),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'installed' => ['akismet/akismet.php'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(string $arg): void {
        $this->expectException(exception: InvalidArgumentException::class);
        Plugin_Data::of(
            factory: Confirmed_Filepath_Factory::of(
                path: Filepath_Factory::of(path: $arg)
                    ->create()
                    ->__toString(),
            )
        );
    }

    public static function throw_data_provider(): iterable {
        yield 'not installed' => ['plugin/plugin.php'];
    }
}
