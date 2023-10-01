<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Version_Header\Tests\Integration;

use InvalidArgumentException;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Plugin_Data\Factory\Plugin_Data_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Version_Header\Version_Header;
use WP_UnitTestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Version_Header\Version_Header
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
            expected: Version_Header::class,
            actual: Version_Header::of(
                factory: Plugin_Data_Factory::of(basename: $arg),
            )
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
        Version_Header::of(
            factory: Plugin_Data_Factory::of(basename: $arg),
        );
    }

    public static function throw_data_provider(): iterable {
        yield 'not installed' => ['plugin/plugin.php'];
    }
}
