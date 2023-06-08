<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices\Tests\Integration;

use JWWS\WPPF\Loader\{
    Hooks\Actions\Admin_Notices\Admin_Notices,
    Plugin\Plugin,
    Tests\Integration\Fixtures\Akismet_Plugin,
    Tests\Integration\Fixtures\Basic_Plugin,
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Admin_Notices\Admin_Notices
 *
 * @internal
 */
final class Of extends TestCase {
    protected static Plugin $basic_plugin;

    protected static Plugin $akismet_plugin;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$basic_plugin   = Basic_Plugin::create_and_get();
        self::$akismet_plugin = Akismet_Plugin::create_and_get();
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Admin_Notices::class,
            actual: Admin_Notices::of(
                plugin: self::$basic_plugin,
                dependency: self::$akismet_plugin,
            ),
        );
    }
}
