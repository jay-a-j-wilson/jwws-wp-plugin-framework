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
    $title = $term->name;

    // Allow for empty name.
    if ($title === '') {
        $title = __(text: '(no title)', domain: 'jwws');
    }

    // Prepend ancestors indentation.
    if (is_taxonomy_hierarchical(taxonomy: $term->taxonomy)) {
        $ancestors = get_ancestors(
            object_id: $term->term_id,
            object_type: $term->taxonomy,
        );

        $title = str_repeat(
            string: '- ',
            times: count(value: $ancestors),
        ) . $title;
    }

    return $title;
}
