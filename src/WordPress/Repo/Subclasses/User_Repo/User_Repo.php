<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
interface User_Repo {
    /**
     * Undocumented function.
     */
    public function find_by_id(int $id): \WP_User;
}
