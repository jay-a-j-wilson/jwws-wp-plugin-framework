<?php

namespace JWWS\WPPF\WordPress\Utility;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Tests,
    Logger\Error_Logger\Error_Logger
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Utility_Tests extends Tests {
    public static function run(): void {
        add_action(
            'wp_loaded',
            [__CLASS__, 'hook'],
        );
    }

    /**
     * Undocumented function.
     */
    public static function hook(): void {
        self::get_term_name();
        self::get_taxonomy_hierarchy();
        self::get_taxonomy_hierarchy_multiple();
    }

    /**
     * Undocumented function.
     */
    private static function get_term_name(): void {
        Error_Logger::log(
            output: Utility::get_term_name(
                term: get_term_by(
                    field: 'slug',
                    value: 'bluetooth',
                    taxonomy: 'product_cat',
                ),
            ),
        );

        Error_Logger::log(
            output: Utility::get_term_name(
                term: get_term_by(
                    field: 'slug',
                    value: 'cases',
                    taxonomy: 'product_cat',
                ),
            ),
        );
    }

    /**
     * Undocumented function.
     */
    private static function get_taxonomy_hierarchy(): void {
        Error_Logger::log(
            output: Utility::get_taxonomy_hierarchy(taxonomy: 'product_cat'),
        );
    }

    /**
     * Undocumented function.
     */
    private static function get_taxonomy_hierarchy_multiple(): void {
        Error_Logger::log(
            output: Utility::get_taxonomy_hierarchy_multiple(
                taxonomies: [
                    'product_tag',
                    'product_cat',
                ],
            ),
        );
    }
}
