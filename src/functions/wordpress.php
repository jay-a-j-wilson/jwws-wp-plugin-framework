<?php

namespace JWWS\WP_Plugin_Framework\Functions\WordPress;

/**
 * Returns term name and appends a hyphen for each level of nesting.
 *
 * @param WP_Term $term
 *
 * @return string
 */
function get_term_name(\WP_Term $term): string {
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
function get_taxonomy_hierarchy(
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
    // These are the children of $parent we'll ultimately copy all the $terms
    // into this new array, but only after they find their own children.
    $children = [];

    // Go through all direct descendants of $parent, and gather their children.
    foreach ($terms as $term) {
        // Recurse to get the direct descendants of "this" term.
        $term->children = get_taxonomy_hierarchy(
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
function get_taxonomy_hierarchy_multiple(
    array $taxonomies,
    int $parent = 0,
    string $order_by = 'name',
): array {
    $results = [];

    foreach ($taxonomies as $taxonomy) {
        $terms = get_taxonomy_hierarchy(
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
 * Flattens an array of objects containing nested objects to one level.
 *
 * @source https://stackoverflow.com/a/48084541
 *
 * @param array  $objects array of objects to flatten
 * @param string $key     object property by which to flatten e.g. 'children'
 *
 * @return array
 */
function flatten(array $objects, string $key): array {
    $output = [];

    foreach ($objects as $object) {
        // separate its children
        $children = $object->$key ?? [];

        // delete its nested objects
        $object->$key = [];

        // and add it to the output array
        $output[] = $object;

        // Recursively flatten the array of children
        $children = flatten(objects: $children, key: $key);

        // and add the result to the output array
        foreach ($children as $child) {
            $output[] = $child;
        }
    }

    return $output;
}

/**
 * Gets the product categories ordered by parent and alphabetised.
 *
 * @return array
 */
function get_product_categories(): array {
    return flatten(
        objects: get_taxonomy_hierarchy(taxonomy: 'product_cat'),
        key: 'children',
    );
}
