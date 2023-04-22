<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\WP_Taxonomy_Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    Logger\Error_Logger\Error_Logger,
    WordPress\Testing\WP_Test
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class WP_Taxonomy_Repo_Test extends WP_Test {
    /**
     * Undocumented function.
     */
    public function hook(): void {
        $this->list_all();
    }

    /**
     * @param string $taxonomy
     */
    private function list_all(): void {
        Error_Logger::log(
            output: WP_Taxonomy_Repo::create()
                ->list_all(),
        );
    }
}
