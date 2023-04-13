<?php

namespace JWWS\WPPF\WordPress\Repo\Taxonomy_Repo;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
interface Taxonomy_Repo {
    /**
     * @param string $name
     *
     * @return \WP_Taxonomy
     */
    public function find_by_name(string $name): \WP_Taxonomy;
}
