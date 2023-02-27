<?php

namespace JWWS\WP_Plugin_Framework\Functions\WooCommerce;

use function JWWS\WP_Plugin_Framework\Functions\WordPress\{
    flatten,
    get_taxonomy_hierarchy
};

/**
 * Gets the product categories ordered by parent and alphabetised.
 *
 * @return array
 */
function get_product_categories(): array {
    if (! is_plugin_active(plugin: 'woocommerce/woocommerce.php')) {
        return [];
    }

    return flatten(
        objects: get_taxonomy_hierarchy(taxonomy: 'product_cat'),
        key: 'children',
    );
}
