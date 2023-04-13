<?php

namespace JWWS\WPPF\WordPress\Repo\Taxonomy_Repo\WP_Taxonomy_Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    WordPress\Testing\WP_Test,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 */
final class WP_Taxonomy_Repo_Test extends WP_Test {
    /**
     * @return void
     */
    public function hook(): void {
        $this->list_all();
    }

    /**
     * @param string $taxonomy
     *
     * @return void
     */
    private function list_all(): void {
        Error_Logger::log(
            output: WP_Taxonomy_Repo::create()
                ->list_all(),
        );
    }
}
