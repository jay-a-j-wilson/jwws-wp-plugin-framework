<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Tests\Integration\Fixtures;

use JWWS\WPPF\{
    Test\PHPUnit\WordPress\Factory\Term_Factory,
    Test\Traits\Printable,
    WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo
};

/**
 * Fixture implementation.
 */
abstract class Fixture extends \WP_UnitTestCase {
    use Printable;

    /**
     * Creates terms for testing.
     */
    final public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        foreach (range(start: 2, end: 3) as $id) {
            Term_Factory::insert_wp_term(
                term_id: $id,
                term_name: "Term {$id}",
                taxonomy: 'category',
            );
        }

        foreach (range(start: 4, end: 5) as $id) {
            Term_Factory::insert_wp_term(
                term_id: $id,
                term_name: "Term {$id}",
                taxonomy: 'post_tag',
            );
        }

    //    self::print(
    //         value: get_terms(args: [
    //             'taxonomy' => Taxonomy_Repo::create()
    //                 ->list_all()
    //                 ->pluck(key: 'name')
    //                 ->to_array(),
    //             'hide_empty' => false,
    //         ]),
    //     );
    }

    /**
     * Deletes terms for consistent test results.
     */
    final public static function tearDownAfterClass(): void {
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

        parent::tearDownAfterClass();
    }
}
