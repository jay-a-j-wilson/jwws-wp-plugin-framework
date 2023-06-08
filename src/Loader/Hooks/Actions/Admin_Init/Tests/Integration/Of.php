<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Action\Admin_Init\Tests\Integration;

use JWWS\WPPF\Loader\{
    Tests\Integration\Fixtures\Basic_Plugin,
    Hooks\Actions\Admin_Init\Admin_Init,
    Plugin\Plugin
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Admin_Init\Admin_Init
 *
 * @internal
 */
final class Of extends TestCase {
    protected static Plugin $plugin;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$plugin = Basic_Plugin::create_and_get();
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Admin_Init::class,
            actual: Admin_Init::of(plugin: self::$plugin),
        );
    }
}
