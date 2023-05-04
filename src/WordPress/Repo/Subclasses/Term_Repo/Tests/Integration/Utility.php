<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Tests\Integration;

/**
 * Fixture implementation.
 */
abstract class Utility extends \WP_UnitTestCase {
    /**
     * Creates terms for testing.
     */
    final public function setup(): void {
        parent::setup();

        // Term id 1 is the default term 'uncategorised' and should not be
        // overwritten.
        foreach (range(start: 2, end: 3) as $id) {
            self::factory()->term->create(args: [
                'term_id'  => $id,
                'taxonomy' => 'category',
            ]);
        }

        foreach (range(start: 4, end: 5) as $id) {
            self::factory()->term->create(args: [
                'term_id'  => $id,
                'taxonomy' => 'post_tag',
            ]);
        }
    }

    /**
     * Deletes terms for consistent test results.
     */
    final public function teardown(): void {
        foreach (range(start: 2, end: 3) as $id) {
            wp_delete_term(
                term: $id,
                taxonomy: 'category',
            );
        }

        foreach (range(start: 4, end: 5) as $id) {
            wp_delete_term(
                term: $id,
                taxonomy: 'post_tag',
            );
        }

        parent::teardown();
    }

    /**
     * Prints terms for debugging.
     */
    private function print(): void {
        echo print_r(
            get_terms([
                'taxonomy'   => 'category',
                'hide_empty' => false,
            ]),
            true,
        ) . PHP_EOL;
    }
}
