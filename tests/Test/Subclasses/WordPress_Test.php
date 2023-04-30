<?php

namespace JWWS\WPPF\Tests\Test\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress,
    Tests\Test\Test
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class WordPress_Test extends Test {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        // self::wp_user_repo();
        // self::wp_term_repo();
        // self::wp_post_repo();
        self::wp_post_type_repo();
        // self::wp_taxonomy_repo();
        // self::generic();
    }

    /**
     * Undocumented function.
     */
    private static function wp_user_repo(): void {
        WordPress\Repo\Subclasses\User_Repo\WP_User_Repo\Tests\WP_User_Repo_Test::run();
    }

    /**
     * Undocumented function.
     */
    private static function wp_term_repo(): void {
        WordPress\Repo\Subclasses\Term_Repo\WP_Term_Repo\Tests\WP_Term_Repo_Test::run();
    }

    /**
     * Undocumented function.
     */
    private static function wp_post_repo(): void {
        WordPress\Repo\Subclasses\Post_Repo\WP_Post_Repo\Tests\WP_Post_Repo_Test::run();
    }

    /**
     * Undocumented function.
     */
    private static function wp_post_type_repo(): void {
        WordPress\Repo\Subclasses\Post_Type_Repo\WP_Post_Type_Repo\Tests\WP_Post_Type_Repo_Test::run();
    }

    /**
     * Undocumented function.
     */
    private static function wp_taxonomy_repo(): void {
        WordPress\Repo\Subclasses\Taxonomy_Repo\WP_Taxonomy_Repo\Tests\WP_Taxonomy_Repo_Test::run();
    }

    /**
     * Undocumented function.
     */
    private static function generic(): void {
        WordPress\Utility\Utility_Tests::run();
    }
}
