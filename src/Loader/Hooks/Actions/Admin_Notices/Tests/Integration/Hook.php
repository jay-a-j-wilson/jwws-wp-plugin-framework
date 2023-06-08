<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices\Tests\Integration;

use JWWS\WPPF\Loader\{
    Hooks\Actions\Admin_Notices\Admin_Notices,
    Tests\Integration\Fixtures\Akismet_Plugin,
    Tests\Integration\Fixtures\Basic_Plugin
};

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices\Admin_Notices
 *
 * @internal
 */
final class Hook extends \WP_UnitTestCase {
    protected static string $hook = 'admin_notices';

    protected static Admin_Notices $object;

    protected static string $method = 'callback';

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$object = Admin_Notices::of(
            plugin: Basic_Plugin::create_and_get(),
            dependency: Akismet_Plugin::create_and_get(),
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
