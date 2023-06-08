<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Tests\Integration\Fixture\Subclasses\Properties;

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
final class Dependencies extends \WP_UnitTestCase {
    protected static Plugin $basic_plugin;

    protected static Plugin $akismet_plugin;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$basic_plugin = Basic_Plugin::create_and_get()
            ->add_dependencies(plugins: Akismet_Plugin::create_and_get())
        ;
    }

    /**
     * @test
     */
    public function pass(): void {
        // echo print_r(self::$basic_plugin->dependencies->to_array(), true);
        self::assertEquals(
            expected: [self::$akismet_plugin],
            actual: self::$basic_plugin->dependencies->to_array(),
        );
    }
}
