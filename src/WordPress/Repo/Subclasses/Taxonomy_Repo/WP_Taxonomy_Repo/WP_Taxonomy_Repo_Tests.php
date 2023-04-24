<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\WP_Taxonomy_Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Tests
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class WP_Taxonomy_Repo_Tests extends WP_Tests {
    /**
     * Undocumented function.
     */
    public function hook(): void {
        self::list_all();
        self::find_by_name(name: 'category');
        self::find_by_name(name: 'invalid');
    }

    /**
     * @param string $taxonomy
     */
    private static function list_all(): void {
        Error_Logger::log(
            output: WP_Taxonomy_Repo::create()
                ->list_all(),
        );
    }

    /**
     * @param string $taxonomy
     */
    private static function find_by_name(string $name): void {
        Error_Logger::log(
            output: WP_Taxonomy_Repo::create()
                ->find_by_name(name: $name),
        );
    }
}
