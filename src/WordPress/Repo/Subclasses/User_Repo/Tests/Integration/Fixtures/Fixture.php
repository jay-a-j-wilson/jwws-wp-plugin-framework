<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\Tests\Integration\Fixtures;

/**
 * Fixture implementation.
 */
abstract class Fixture extends \WP_UnitTestCase {
    /**
     * Creates users for testing.
     */
    final public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::factory()->user->create_many(count: 4);
        // self::print();
    }

    /**
     * Deletes users for consistent test results.
     */
    final public static function tearDownAfterClass(): void {
        foreach (range(start: 2, end: 5) as $id) {
            wp_delete_user(id: $id);
        }

        parent::tearDownAfterClass();
    }

    /**
     * Prints users for debugging.
     */
    private static function print(): void {
        echo print_r(
            get_users(),
            true,
        ) . PHP_EOL;
    }
}
