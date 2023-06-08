<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Tests\Integration\Methods\Dependencies;

use JWWS\WPPF\Loader\{
    Plugin\Plugin,
    Tests\Integration\Fixtures\Akismet_Plugin,
    Tests\Integration\Fixtures\Basic_Plugin,
};

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Plugin
 *
 * @internal
 */
final class Add_Dependencies extends \WP_UnitTestCase {
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
    public function pass_zero(): Plugin {
        self::assertCount(
            expectedCount: 0,
            haystack: self::$basic_plugin->dependencies,
        );

        return self::$basic_plugin;
    }

    /**
     * @test
     *
     * @depends pass_zero
     */
    public function pass_add_two(Plugin $plugin): void {
        self::assertCount(
            expectedCount: 1,
            haystack: $plugin->add_dependencies(
                plugins: self::$akismet_plugin,
            )->dependencies,
        );
    }

    /**
     * ! Finish.
     */
    public function pass_add_duplicate_dependency(Plugin $plugin): void {
    }
}
