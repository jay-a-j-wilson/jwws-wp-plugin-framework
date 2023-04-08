<?php

namespace JWWS\WPPF\WordPress\Terms\Post\Categories;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Testing\Abstract_WP_Test,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 */
final class Categories_Test extends Abstract_WP_Test {
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
    private function list_all(): void {
        Error_Logger::log(
            output: Categories::create()->list_all(),
        );
    }

    /**
     * @return void
     */
    private function find_by_id(): void {
        // Uncategorized
        Error_Logger::log(
            output: Categories::create()->find_by_id(id: 97),
        );
    }
}
