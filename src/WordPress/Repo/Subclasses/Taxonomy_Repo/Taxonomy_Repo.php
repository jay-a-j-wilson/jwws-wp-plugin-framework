<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
interface Taxonomy_Repo {
    /**
     * Undocumented function.
     */
    public function find_by_name(string $name): \WP_Taxonomy;
}
