<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
interface Post_Type_Repo {
    /**
     * @param string $name
     *
     * @return \WP_Post_Type
     */
    public function find_by_name(string $name): \WP_Post_Type;
}
