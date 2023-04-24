<?php

namespace JWWS\WPPF\WordPress\Utility;

use InvalidArgumentException;
use JWWS\WPPF\{
    Common\Security\Security,
    Assertion\Assertion
};
use WP_User;

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
     * Wrapper function for 'get_post()'. Replaces 'null' return type with an
     * exception.
     *
     * Retrieves post data given a post ID or post object.
     *
     * See sanitize_post() for optional $filter values. Also, the parameter
     * $post, must be given as a variable, since it is passed by reference.
     *
     * @param int|\WP_Post|null $post   Optional. Post ID or post object.
     *                                  Defaults to global $post.
     * @param string            $output Optional. The required return type.
     *                                  One of OBJECT, ARRAY_A, or ARRAY_N,
     *                                  which correspond to a WP_Post object, an
     *                                  associative array, or a numeric array,
     *                                  respectively.
     *                                  Default OBJECT.
     * @param string            $filter Optional. Type of filter to apply.
     *                                  Accepts 'raw', 'edit', 'db', or
     *                                  'display'.
     *                                  Default 'raw'.
     *
     * @throws \InvalidArgumentException if post not found
     */
    public static function get_post(
        int|\WP_Post|null $post = null,
        string $output = \OBJECT,
        string $filter = 'raw',
    ): \WP_Post|array {
        $post = get_post(post: $post, output: $output, filter: $filter);

        Assertion::of(value: $post)
            ->not_null(message: 'Post not found.')
        ;

        return $post;
    }

    /**
     * Wrapper function for 'get_user_by()'. Replaces 'false' return type with
     * an exception.
     *
     * Retrieve user info by a given field.
     *
     * @param string     $field The field to retrieve the user with.
     *                          id | ID | slug | email | login.
     * @param int|string $value A value for $field.
     *                          A user ID, slug, email address, or login name.
     *
     * @throws InvalidArgumentException if user not found
     */
    public static function get_user_by(
        string $field,
        int|string $value,
    ): \WP_User {
        $user = get_user_by(field: $field, value: $value);

        Assertion::of(value: $user)
            ->not_false(message: "User with {$field} '{$value}' not found.")
        ;

        return $user;
    }

    /**
     * Returns term name and appends a hyphen for each level of nesting.
     *
     * @param WP_Term $term
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
     * @param array $taxonomies taxonomy slugs
     * @param int   $parent     starting parent term id
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
     * @param int $parent - parent term id
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
        // $terms into this new array, but only after they find their own
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

        // Send the results back to the caller.
        return $children;
    }
}
