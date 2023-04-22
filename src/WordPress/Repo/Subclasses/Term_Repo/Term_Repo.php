<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
interface Term_Repo {
    /**
     * @param string $taxonomy_names
     *
     * @return self
     */
    public static function of(string ...$taxonomy_names): self;

    /**
     * @param int $id
     *
     * @return \WP_Term
     */
    public function find_by_id(int $id): \WP_Term;
}
