<?php

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
interface Term_Repo {
    /**
     * Undocumented function.
     */
    public static function of(string ...$taxonomy_names): self;

    /**
     * Undocumented function.
     */
    public function find_by_id(int $id): \WP_Term;
}
