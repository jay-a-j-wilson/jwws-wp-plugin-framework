<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Tests\Integration\Methods;

use JWWS\WPPF\Loader\Plugin\Plugin;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Plugin
 *
 * @internal
 */
final class Basename_Equals extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => slug: $arg_1, fallback name: $arg_2, name: $arg_3
     */
    public function pass(string $arg_1, string $arg_2, string $arg_3): void {
        self::assertTrue(
            condition: Plugin::of_slug(slug: $arg_1, fallback_name: $arg_2)
                ->basename_equals(basename: $arg_3),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'not installed' => ['plugin', 'Plugin', 'plugin/plugin.php'];

        yield 'installed' => ['akismet', 'Akismet', 'akismet/akismet.php'];
    }
}
