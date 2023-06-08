<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Utility\Tests\Integration\Fixtures;

use JWWS\WPPF\Tests\Traits\{
    Printable,
    WordPress\Term_Factory
};

/**
 * @internal
 */
abstract class Fixture extends \WP_UnitTestCase {
    use Printable;
    use Term_Factory;

    /**
     * @throws \InvalidArgumentException
     */
    final public static function create(): void {
        self::insert_wp_term(
            term_id: 2, 
            term_name: 'Vegetable', 
            taxonomy: 'category'
        );

        self::insert_wp_term(
            term_id: 3, 
            term_name: 'Root', 
            taxonomy: 'category',
            parent_id: 2
        );

        self::insert_wp_term(
            term_id: 4, 
            term_name: 'Allium', 
            taxonomy: 'category',
            parent_id: 2
        );

        self::insert_wp_term(
            term_id: 5, 
            term_name: 'Legume', 
            taxonomy: 'category',
            parent_id: 2
        );

        self::insert_wp_term(
            term_id: 6, 
            term_name: 'Fruit', 
            taxonomy: 'category'
        );

        self::insert_wp_term(
            term_id: 7, 
            term_name: 'Citrus', 
            taxonomy: 'category',
            parent_id: 6
        );

        self::insert_wp_term(
            term_id: 8, 
            term_name: 'Lemon', 
            taxonomy: 'category',
            parent_id: 7
        );

        self::insert_wp_term(
            term_id: 9, 
            term_name: 'Berry', 
            taxonomy: 'category',
            parent_id: 6
        );

        self::insert_wp_term(
            term_id: 10, 
            term_name: 'Stone', 
            taxonomy: 'category',
            parent_id: 6
        );

        self::insert_wp_term(
            term_id: 11, 
            term_name: 'Red', 
            taxonomy: 'post_tag',
        );
    }

    /**
     * @throws \InvalidArgumentException
     */
    final public static function destroy(): void {
        foreach (range(start: 2, end: 11) as $id) {
            wp_delete_term(
                term: $id,
                taxonomy: 'category',
            );
        }
    }

    final public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::create();

        // self::print(
        //     value: get_terms(args: [
        //         'taxonomy'   => 'category',
        //         'hide_empty' => false,
        //     ]),
        // );
    }

    final public static function tearDownAfterClass(): void {
        // self::destroy();

        parent::tearDownAfterClass();
    }
}
