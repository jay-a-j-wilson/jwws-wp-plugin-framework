<?php

namespace JWWS\WPPF\WordPress\Terms;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
interface Terms {
    /**
     * @return static
     */
    public static function create(): static;

    /**
     * @return \WP_Term[]
     */
    public function list_all(): array;

    /**
     * @param int $id
     *
     * @return \WP_Term
     */
    public function find_by_id(int $id): \WP_Term;
}
