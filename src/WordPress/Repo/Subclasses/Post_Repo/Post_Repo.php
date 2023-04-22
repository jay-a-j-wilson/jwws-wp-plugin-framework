<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
interface Post_Repo {
    /**
     * Undocumented function.
     */
    public static function of(string ...$post_type_names): self;

    /**
     * Undocumented function.
     */
    public function find_by_id(int $id): \WP_Post;
}
