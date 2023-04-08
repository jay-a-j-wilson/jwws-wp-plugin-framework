<?php

namespace JWWS\WPPF\WordPress\Utilities;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Abstract_Test,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 */
final class Generic_Test extends Abstract_Test {
    /**
     * @return void
     */
    public static function run(): void {
        add_action(
            'wp_loaded',
            [__CLASS__, 'hook'],
        );
    }

    /**
     * @return void
     */
    public static function hook(): void {
        self::get_term_name();
        self::get_taxonomy_hierarchy();
        self::get_taxonomy_hierarchy_multiple();
    }

    /**
     */
    private static function get_term_name(): void {
        Error_Logger::log(
            output: Generic::get_term_name(
                term: get_term_by(
                    field: 'slug',
                    value: 'bluetooth',
                    taxonomy: 'product_cat',
                ),
            ),
        );

        Error_Logger::log(
            output: Generic::get_term_name(
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
        Error_Logger::log(
            output: Generic::get_taxonomy_hierarchy(taxonomy: 'product_cat'),
        );
    }

    /**
     */
    private static function get_taxonomy_hierarchy_multiple(): void {
        Error_Logger::log(
            output: Generic::get_taxonomy_hierarchy_multiple(
                taxonomies: [
                    'product_tag',
                    'product_cat',
                ],
            ),
        );
    }
}
