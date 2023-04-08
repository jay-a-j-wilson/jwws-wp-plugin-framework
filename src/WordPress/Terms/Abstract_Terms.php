<?php

namespace JWWS\WPPF\WordPress\Terms;

use JWWS\WPPF\{
    Security\Security,
    WordPress\Terms\Terms
};

Security::stop_direct_access();

/**
 */
abstract class Abstract_Terms implements Terms {
    /**
     * @return static
     */
    public static function create(): static {
        return new static();
    }

    /**
     * @var string
     */
    protected string $taxonomy;

    /**
     * @return void
     */
    protected function __construct() {
    }

    /**
     * @return \WP_Term[]
     */
    public function list_all(): array {
        return get_terms(args: [
            'taxonomy'   => $this->taxonomy,
            'hide_empty' => false,
        ]);
    }

    /**
     * @param int $id
     *
     * @return \WP_Term
     */
    public function find_by_id(int $id): \WP_Term {
        return get_term_by(
            field: 'id',
            value: $id,
            taxonomy: $this->taxonomy,
        );
    }
}
