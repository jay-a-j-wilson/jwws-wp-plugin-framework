<?php

namespace JWWS\WPPF;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 */
final class WooCommerce {
    /**
     * Do not instantiate.
     */
    private function __construct() {
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
