<?php

namespace JWWS\WPPF;

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
        if (! is_plugin_active(plugin: 'woocommerce/woocommerce.php')) {
            return [];
        }

        return Utility::flatten(
            objects: WordPress::get_taxonomy_hierarchy(taxonomy: 'product_cat'),
            key: 'children',
        );
    }
}
