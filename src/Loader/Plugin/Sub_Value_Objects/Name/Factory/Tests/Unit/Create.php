<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Factory\Tests\Unit;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Factory\Name_Factory;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Name;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Factory\Name_Factory
 *
 * @internal
 *
 * @small
 */
final class Create extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => [$arg_1, $arg_2]
     */
    public function pass(string $arg_1, string $arg_2): void {
        self::assertInstanceOf(
            expected: Name::class,
            actual: Name_Factory::of(
                basename: $arg_1,
                fallback_name: $arg_2,
            )
                ->create(),
        );
    }

    public static function pass_data_provider(): iterable {
        yield 'installed' => [
            'akismet/akismet.php',
            'Akismet Anti-Spam: Spam Protection',
        ];

        yield 'not installed' => ['plugin/plugin.php', 'Plugin'];

        yield 'empty' => ['', ''];
    }
}
