<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Tests\Integration\Fixtures;

use JWWS\WPPF\Loader\Plugin\Plugin;

/**
 * @internal
 */
abstract class Fixture extends \WP_UnitTestCase {
    protected static Plugin $basic_plugin;

    protected static Plugin $akismet_plugin;

    /**
     * Creates plugin for testing.
     */
    final public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$basic_plugin   = Basic_Plugin_Factory::create_and_get();
        self::$akismet_plugin = Akismet_Plugin_Factory::create_and_get();

        // self::print(self::$plugin);
    }

    /**
     * Deletes plugin for consistent test results.
     */
    final public static function tearDownAfterClass(): void {
        parent::tearDownAfterClass();
    }
}
