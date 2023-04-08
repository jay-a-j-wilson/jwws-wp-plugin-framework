<?php

namespace JWWS\WPPF\WooCommerce;

use JWWS\WPPF\{
    Security\Security,
    Utility\Utility,
    WordPress\WordPress
};

Security::stop_direct_access();

/**
 * Utility
 */
final class WooCommerce {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * @param int $id
     *
     * @return WP_Term
     */
    public static function get_product_category_by_id(int $id): \WP_Term {
        return get_term_by(
            field: 'id',
            value: $id,
            taxonomy: 'product_cat',
        );
    }

    /**
     * Gets the product categories ordered by parent and alphabetised.
     *
     * @return array
     */
    public static function get_product_categories(): array {
        return Utility::flatten(
            objects: WordPress::get_taxonomy_hierarchy(taxonomy: 'product_cat'),
            key: 'children',
        );
    }
}
