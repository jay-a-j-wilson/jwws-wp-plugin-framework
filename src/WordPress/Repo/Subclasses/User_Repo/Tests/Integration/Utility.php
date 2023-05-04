<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\Tests\Integration;

/**
 * Fixture implementation.
 */
abstract class Utility extends \WP_UnitTestCase {
    /**
     * Creates users for testing.
     */
    final public function setup(): void {
        parent::setup();

        // User id 1 is the default admin user and should not be overwritten.
        foreach (range(start: 2, end: 5) as $id) {
            echo $id;
            self::factory()->user->create(args: [
                // 'import_id' => $id,
                // 'ID'        => $id,
            ]);
        }

        $this->print();
    }

    /**
     * Deletes users for consistent test results.
     */
    // final public function teardown(): void {
    //     foreach (range(start: 2, end: 5) as $id) {
    //         wp_delete_user(id: $id);
    //     }

    //     parent::teardown();
    // }

    /**
     * Prints users for debugging.
     */
    private function print(): void {
        echo print_r(
            get_users(),
            true,
        ) . PHP_EOL;
    }
}
