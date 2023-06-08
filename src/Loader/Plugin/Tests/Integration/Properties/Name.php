<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Tests\Integration\Properties;

use JWWS\WPPF\Loader\Plugin\Plugin;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Plugin
 *
 * @internal
 */
final class Name extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => slug: $arg_1, fallback name: $arg_2, name: $arg_3
     */
    public function pass(string $arg_1, string $arg_2, string $arg_3): void {
        self::assertSame(
            expected: $arg_3,
            actual: Plugin::of_slug(slug: $arg_1, fallback_name: $arg_2)
                ->name->__toString(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'not installed' => ['plugin', 'Plugin', 'Plugin'];

        yield 'installed' => ['akismet', 'Akismet', 'Akismet Anti-Spam'];
    }
}
