<?php declare(strict_types=1);

namespace JWWS\WPPF\Tests\PHPUnit\WordPress\Factory;

final class Term_Factory {
    /**
     * @return void
     */
    private function __construct() {}

    public static function insert_wp_term(
        int $term_id,
        string $term_name,
        string $taxonomy,
        int $parent_id = 0,
    ): void {
        global $wpdb; // WordPress database object

        // Prefix the terms table name with the WordPress prefix
        $table_terms = $wpdb->prefix . 'terms';

        // Insert the term into the terms table
        $wpdb->query(
            query: $wpdb->prepare(
                "
                INSERT INTO {$table_terms}
                (term_id, name, slug, term_group)
                VALUES
                (%d, %s, %s, 0);
                ",
                $term_id,
                $term_name,
                sanitize_title(title: $term_name),
            ),
        );

        // Prefix the term_taxonomy table name with the WordPress prefix
        $table_term_taxonomy = $wpdb->prefix . 'term_taxonomy';

        // Insert the term-taxonomy relationship into the term_taxonomy table
        $wpdb->query(
            query: $wpdb->prepare(
                "
                INSERT INTO {$table_term_taxonomy}
                (term_id, taxonomy, description, parent, count)
                VALUES
                (%d, %s, '', %d, 0)
                ",
                $term_id,
                $taxonomy,
                $parent_id,
            ),
        );
    }
}
