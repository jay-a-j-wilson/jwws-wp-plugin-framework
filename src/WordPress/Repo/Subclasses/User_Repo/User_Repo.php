<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\User_Repo;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
interface User_Repo {
    /**
     * @param int $id
     *
     * @return \WP_User
     */
    public function find_by_id(int $id): \WP_User;
}
