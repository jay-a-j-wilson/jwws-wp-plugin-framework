<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\WP_User_Repo\Tests;

use JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo\WP_User_Repo\WP_User_Repo;
use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Test
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class WP_User_Repo_Test extends WP_Test {
    /**
     * Undocumented function.
     */
    public function hook(): void {
        self::find_by_id(id: 157776810);
        self::find_by_id(id: 33);
        self::list_all();
    }

    /**
     * Undocumented function.
     */
    private static function find_by_id(int $id): void {
        Error_Logger::log(
            output: WP_User_Repo::create()
                ->find_by_id(id: $id),
        );
    }

    /**
     * Undocumented function.
     */
    private static function list_all(): void {
        Error_Logger::log(
            output: WP_User_Repo::create()
                ->list_all(),
        );
    }
}
