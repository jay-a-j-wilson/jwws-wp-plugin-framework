<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Action\Deactivated_Plugin\Tests\Integration;

use JWWS\WPPF\Loader\{
    Tests\Integration\Fixtures\Basic_Plugin,
    Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin,
    Plugin\Plugin
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Hooks\Actions\Deactivated_Plugin\Deactivated_Plugin
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
            expected: Deactivated_Plugin::class,
            actual: Deactivated_Plugin::of(plugin: self::$plugin),
        );
    }
}
