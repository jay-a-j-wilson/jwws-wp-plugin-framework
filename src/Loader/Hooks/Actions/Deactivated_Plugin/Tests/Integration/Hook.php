<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Actions\Deactivated_Plugin\Tests\Integration;

use JWWS\WPPF\Loader\{
    Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin,
    Tests\Integration\Fixtures\Basic_Plugin
};

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin
 *
 * @internal
 */
final class Hook extends \WP_UnitTestCase {
    protected static string $hook = 'deactivated_plugin';

    protected static Deactivated_Plugin $object;

    protected static string $method = 'callback';

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$object = Deactivated_Plugin::of(
            plugin: Basic_Plugin::create_and_get(),
        );
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertFalse(
            condition: has_action(
                self::$hook,
                [
                    self::$object,
                    self::$method,
                ],
            ),
        );
    }

    /**
     * @test
     *
     * @depends pass
     */
    public function pass_action(): void {
        self::$object->hook();

        self::assertSame(
            expected: 10,
            actual: has_action(
                self::$hook,
                [
                    self::$object,
                    self::$method,
                ],
            ),
        );
    }
}
