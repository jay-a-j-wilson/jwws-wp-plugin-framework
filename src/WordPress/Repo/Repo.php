<?php

namespace JWWS\WPPF\WordPress\Repo;

use JWWS\WPPF\{
    Common\Security\Security,
    Collection\Collection,
};

Security::stop_direct_access();

/**
 * ViewModel Repository.
 */
abstract class Repo {
    /**
     * Undocumented function.
     */
    abstract public static function create(): self;

    /**
     * Undocumented function.
     */
    protected function __construct() {
    }

    /**
     * Undocumented function.
     */
    abstract public function list_all(): Collection;
}
