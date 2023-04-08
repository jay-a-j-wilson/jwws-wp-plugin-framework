<?php

namespace JWWS\WPPF\WordPress\Utilities;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 * Utility
 */
final class Generic {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * Returns term name and appends a hyphen for each level of nesting.
     *
     * @param WP_Term $term
     *
     * @return string
     */
    public static function get_term_name(\WP_Term $term): string {
        // Allow for empty name.
        if ($term->name === '') {
            $term->name = __(text: '(no title)', domain: 'jwws');
        }

        // Prepend ancestors indentation.
        if (is_taxonomy_hierarchical(taxonomy: $term->taxonomy)) {
            $ancestors = get_ancestors(
                object_id: $term->term_id,
                object_type: $term->taxonomy,
            );

            $term->name = str_repeat(
                string: '- ',
                times: count(value: $ancestors),
            ) . $term->name;
        }

        return $term->name;
    }

    /**
     * Recursively get all taxonomies as complete hierarchies.
     *
     * @source https://www.daggerhartlab.com/wordpress-get-taxonomy-hierarchy-including-children
     *
     * @param array  $taxonomies taxonomy slugs
     * @param int    $parent     starting parent term id
     * @param string $order_by
     *
     * @return array
     */
    public static function get_taxonomy_hierarchy_multiple(
        array $taxonomies,
        int $parent = 0,
        string $order_by = 'name',
    ): array {
        $results = [];

        foreach ($taxonomies as $taxonomy) {
            $terms = self::get_taxonomy_hierarchy(
                taxonomy: $taxonomy,
                parent: $parent,
                order_by: $order_by,
            );

            if ($terms) {
                $results[$taxonomy] = $terms;
            }
        }

        return $results;
    }

    /**
     * Recursively get taxonomy and its children in alphabetical order.
     *
     * @source https://www.daggerhartlab.com/wordpress-get-taxonomy-hierarchy-including-children
     *
     * @param string $taxonomy
     * @param int    $parent   - parent term id
     * @param string $order_by
     *
     * @return array
     */
    public static function get_taxonomy_hierarchy(
        string $taxonomy,
        int $parent = 0,
        string $order_by = 'name',
    ): array {
        // Get all direct descendants of the $parent.
        $terms = get_terms(
            args: [
                'taxonomy'   => $taxonomy,
                'parent'     => $parent,
                'orderby'    => $order_by,
                'hide_empty' => false,
            ],
        );

        if (is_wp_error(thing: $terms)) {
            return [];
        }

        // Prepare a new array.
        // These are the children of $parent we'll ultimately copy all the
        // $termsinto this new array, but only after they find their own
        // children.
        $children = [];

        // Go through all direct descendants of $parent, and gather their
        // children.
        foreach ($terms as $term) {
            // Recurse to get the direct descendants of "this" term.
            $term->children = self::get_taxonomy_hierarchy(
                taxonomy: $taxonomy,
                parent: $term->term_id,
                order_by: $order_by,
            );

            // Add the term to our new array.
            $children[$term->term_id] = $term;
        }

        // Aend the results back to the caller.
        return $children;
    }
}
