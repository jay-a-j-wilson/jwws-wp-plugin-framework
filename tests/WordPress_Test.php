<?php

namespace JWWS\WPPF\Tests;

use \JWWS\WPPF\{
    WordPress,
    Logger
};

/**
 */
class WordPress_Test {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * @return void
     */
    public static function hook(): void {
        add_action(
            'wp_loaded',
            [__CLASS__, 'test'],
        );
    }

    /**
     * @return void
     */
    public static function test(): void {
        self::get_term_name();
        self::get_taxonomy_hierarchy();
        self::get_taxonomy_hierarchy_multiple();
    }

    /**
     */
    private static function get_term_name(): void {
        Logger::error_log(
            output: WordPress::get_term_name(
                term: get_term_by(
                    field: 'slug',
                    value: 'bluetooth',
                    taxonomy: 'product_cat',
                ),
            ),
        );

        Logger::error_log(
            output: WordPress::get_term_name(
                term: get_term_by(
                    field: 'slug',
                    value: 'cases',
                    taxonomy: 'product_cat',
                ),
            ),
        );
    }

    /**
     */
    private static function get_taxonomy_hierarchy(): void {
        Logger::error_log(
            output: WordPress::get_taxonomy_hierarchy(taxonomy: 'product_cat'),
        );
    }

    /**
     */
    private static function get_taxonomy_hierarchy_multiple(): void {
        Logger::error_log(
            output: WordPress::get_taxonomy_hierarchy_multiple(
                taxonomies: [
                    'product_tag',
                    'product_cat',
                ],
            ),
        );
    }
}
