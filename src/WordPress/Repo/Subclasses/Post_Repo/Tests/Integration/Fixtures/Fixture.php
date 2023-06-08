<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Tests\Integration\Fixtures;

use JWWS\WPPF\Tests\Traits\Printable;

/**
 * Fixture implementation.
 *
 * @internal
 */
abstract class Fixture extends \WP_UnitTestCase {
    use Printable;

    /**
     * Creates posts for testing.
     */
    final public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

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

        // self::print(value: [...get_posts(), ...get_pages()]);
    }

    /**
     * Deletes posts for consistent test results.
     */
    final public static function tearDownAfterClass(): void {
        foreach (range(start: 1, end: 5) as $id) {
            wp_delete_post(
                postid: $id,
                force_delete: true,
            );
        }

        parent::tearDownAfterClass();
    }
}
