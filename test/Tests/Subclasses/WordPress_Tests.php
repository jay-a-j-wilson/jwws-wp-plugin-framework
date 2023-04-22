<?php

namespace JWWS\WPPF\Test\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class WordPress_Tests extends Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::wp_user_rep();
        self::wp_term_rep();
        self::wp_post_rep();
        self::wp_post_type_rep();
        self::wp_taxonomy_repo();
        self::generic();
    }

    /**
     * Undocumented function.
     */
    private static function wp_user_rep(): void {
        WordPress\Repo\Subclasses\User_Repo\WP_User_Repo\WP_User_Repo_Test::run();
    }

    /**
     * Undocumented function.
     */
    private static function wp_term_rep(): void {
        WordPress\Repo\Subclasses\Term_Repo\WP_Term_Repo\WP_Term_Repo_Test::run();
    }

    /**
     * Undocumented function.
     */
    private static function wp_post_rep(): void {
        WordPress\Repo\Subclasses\Post_Repo\WP_Post_Repo\WP_Post_Repo_Test::run();
    }

    /**
     * Undocumented function.
     */
    private static function wp_post_type_rep(): void {
        WordPress\Repo\Subclasses\Post_Type_Repo\WP_Post_Type_Repo\WP_Post_Type_Repo_Test::run();
    }

    /**
     * Undocumented function.
     */
    private static function wp_taxonomy_repo(): void {
        WordPress\Repo\Subclasses\Taxonomy_Repo\WP_Taxonomy_Repo\WP_Taxonomy_Repo_Test::run();
    }

    /**
     * Undocumented function.
     */
    private static function generic(): void {
        WordPress\Utility\Generic_Test::run();
    }
}
