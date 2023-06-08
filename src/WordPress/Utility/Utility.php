<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Utility;

use JWWS\WPPF\{
    Assertion\Assertion,
    Common\Security\Security
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Utility {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * Returns term name and appends a hyphen for each level of nesting.
     *
     * @param WP_Term $term
     */
    public static function get_term_name(\WP_Term $term): string {
        return is_taxonomy_hierarchical(taxonomy: $term->taxonomy)
            ? str_repeat(
                string: '- ',
                times: \count(
                    value: get_ancestors(
                        object_id: $term->term_id,
                        object_type: $term->taxonomy,
                    ),
                ),
            ) . $term->name
            : $term->name;
    }

    /**
     * Fetches multiple taxonomies and their children as complete hierarchies.
     *
     * @source https://www.daggerhartlab.com/wordpress-get-taxonomy-hierarchy-including-children
     *
     * @param array $taxonomies taxonomy slugs
     * @param int   $parent     starting parent term id
     */
    public static function get_taxonomy_hierarchy_multiple(
        array $taxonomies,
        int $parent = 0,
        string $order_by = 'name',
    ): array {
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
     * Fetches a taxonomy and its children in alphabetical order.
     *
     * @source https://www.daggerhartlab.com/wordpress-get-taxonomy-hierarchy-including-children
     */
    public static function get_taxonomy_hierarchy(
        string $taxonomy,
        int $parent = 0,
        string $order_by = 'name',
    ): array {
        return array_map(
            callback: function (\WP_Term $term) use ($taxonomy, $order_by): \WP_Term {
                $term->children = self::get_taxonomy_hierarchy(
                    taxonomy: $taxonomy,
                    parent: $term->term_id,
                    order_by: $order_by,
                );

                return $term;
            },
            array: get_terms(args: [
                'taxonomy'   => $taxonomy,
                'parent'     => $parent,
                'orderby'    => $order_by,
                'hide_empty' => false,
            ]),
        );
    }
}
