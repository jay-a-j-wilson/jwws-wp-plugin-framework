<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Tests\Integration;

/**
 * Fixture implementation.
 */
abstract class Utility extends \WP_UnitTestCase {
    /**
     * Creates posts for testing.
     */
    final public function setup(): void {
        parent::setup();

        foreach (range(start: 1, end: 3) as $id) {
            self::factory()->post->create(args: [
                'import_id' => $id,
                'post_type' => 'post',
            ]);
        }

        foreach (range(start: 4, end: 5) as $id) {
            self::factory()->post->create(args: [
                'import_id' => $id,
                'post_type' => 'page',
            ]);
        }
    }

    /**
     * Deletes posts for consistent test results.
     */
    final public function teardown(): void {
        foreach (range(start: 1, end: 3) as $id) {
            wp_delete_post(
                postid: $id,
                force_delete: true,
            );
        }

        foreach (range(start: 4, end: 5) as $id) {
            wp_delete_post(
                postid: $id,
                force_delete: true,
            );
        }

        parent::teardown();
    }

    /**
     * Prints posts for debugging.
     */
    private function print(): void {
        echo print_r(
            get_posts(),
            true,
        ) . PHP_EOL;
    }
}
