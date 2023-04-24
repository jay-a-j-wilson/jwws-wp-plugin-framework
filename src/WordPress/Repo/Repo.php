<?php

namespace JWWS\WPPF\WordPress\Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    Collection\Collection,
};

// Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
abstract class Repo {
    /**
     * Factory method.
     */
    abstract public static function create(): self;

    /**
     * Enforces use of factory method.
     */
    protected function __construct() {
    }

    /**
     * Returns all repository elements.
     */
    abstract public function list_all(): Collection;
}
