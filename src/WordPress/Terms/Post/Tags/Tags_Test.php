<?php

namespace JWWS\WPPF\WordPress\Terms\Post\Tags;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Testing\Abstract_WP_Test,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 */
final class Tags_Test extends Abstract_WP_Test {
    /**
     * @return void
     */
    public function hook(): void {
        // $this->find_by_id();
        $this->list_all();
    }

    /**
     * @return void
     */
    private function list_all(): void {
        Error_Logger::log(
            output: Tags::create()->list_all(),
        );
    }

    /**
     * @return void
     */
    private function find_by_id(): void {
        // Uncategorized
        Error_Logger::log(
            output: Tags::create()->find_by_id(id: 97),
        );
    }
}
