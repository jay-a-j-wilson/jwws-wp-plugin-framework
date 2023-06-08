<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Tests\Integration\Methods\Dependencies;

use JWWS\WPPF\Loader\{
    Plugin\Plugin,
    Tests\Integration\Fixtures\Basic_Plugin,
};

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Plugin
 *
 * @internal
 */
final class Dependencies_Names extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     */
    public function pass(array $arg_1, bool $arg_2): void {
        self::assertSame(
            expected: $arg_2,
            actual: $arg_1 === Basic_Plugin::create()
                ->value
                ->add_dependencies(
                    Plugin::of_slug(
                        slug: 'plugin-dependency-1',
                        fallback_name: 'Plugin Dependency 1',
                    ),
                    Plugin::of_slug(
                        slug: 'plugin-dependency-2',
                        fallback_name: 'Plugin Dependency 2',
                    ),
                )
                ->dependencies_names()->to_array(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'all' => [
            ['Plugin Dependency 1', 'Plugin Dependency 2'],
            true,
        ];

        yield 'some' => [
            ['Plugin Dependency 1', 'Plugin Dependency 3'],
            false,
        ];

        yield 'none' => [
            ['Plugin Dependency 3', 'Plugin Dependency 4'],
            false,
        ];
    }
}
