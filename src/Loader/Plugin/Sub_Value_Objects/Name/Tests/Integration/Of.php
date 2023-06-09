<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Tests\Integration;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Name;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Name
 *
 * @internal
 */
final class Of extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => args [$arg_1, $arg_2]
     */
    public function pass(string $arg_1, string $arg_2): void {
        self::assertEquals(
            expected: $arg_2,
            actual: Name::of(basename: $arg_1, fallback_name: $arg_2)->value,
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'installed' => ['akismet/akismet.php', 'Akismet Anti-Spam'];

        yield 'not installed' => ['plugin/plugin.php', 'Plugin'];
    }
}
