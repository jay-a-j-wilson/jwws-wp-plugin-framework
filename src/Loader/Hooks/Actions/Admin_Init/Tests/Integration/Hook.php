<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Tests\Integration;

use JWWS\WPPF\Loader\{
    Hooks\Actions\Admin_Init\Admin_Init,
    Tests\Integration\Fixtures\Basic_Plugin
};

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Admin_Init
 *
 * @internal
 */
final class Hook extends \WP_UnitTestCase {
    protected static string $hook = 'admin_init';

    protected static Admin_Init $object;

    protected static string $method = 'callback';

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$object = Admin_Init::of(
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
