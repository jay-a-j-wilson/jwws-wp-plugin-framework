<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
interface Post_Repo {
    /**
     * @param string $post_type_names
     *
     * @return self
     */
    public static function of(string ...$post_type_names): self;

    /**
     * @param int $id
     *
     * @return \WP_Post
     */
    public function find_by_id(int $id): \WP_Post;
}
