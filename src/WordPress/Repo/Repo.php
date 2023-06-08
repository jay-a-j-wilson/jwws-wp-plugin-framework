<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security,
};

// Security::stop_direct_access();

/**
 * @codeCoverageIgnore
 *
 * ViewModel Repository
 */
abstract class Repo {
    /**
     * Factory method.
     */
    final public static function create(): static {
        return new static();
    }

    /**
     * Enforces use of factory method.
     *
     * @return void
     */
    protected function __construct() {
    }

    /**
     * Returns all repository elements.
     */
    abstract public function list_all(): Collection;
}
