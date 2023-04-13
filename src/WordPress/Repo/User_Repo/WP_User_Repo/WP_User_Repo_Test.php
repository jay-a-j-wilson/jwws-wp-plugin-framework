<?php

namespace JWWS\WPPF\WordPress\Repo\User_Repo\WP_User_Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Testing\WP_Test,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 */
final class WP_User_Repo_Test extends WP_Test {
    /**
     * @return void
     */
    public function hook(): void {
        $this->find_by_id();
        $this->list_all();
    }

    /**
     * @return void
     */
    private function find_by_id(): void {
        Error_Logger::log(
            output: WP_User_Repo::create()
                ->find_by_id(id: 157776810),
        );
    }

    /**
     * @return void
     */
    private function list_all(): void {
        Error_Logger::log(
            output: WP_User_Repo::create()
                ->list_all(),
        );
    }
}
