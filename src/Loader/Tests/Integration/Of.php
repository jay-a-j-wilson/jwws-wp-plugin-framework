<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Tests\Integration;

use JWWS\WPPF\Loader\{
    Loader,
    Plugin\Plugin,
    Tests\Integration\Fixtures\Basic_Plugin
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Loader
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
            expected: Loader::class,
            actual: Loader::of(plugin: self::$plugin),
        );
    }
}
