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
     * @return self
     */
    abstract public static function create(): self;

    /**
     * @return void
     */
    protected function __construct() {
    }

    /**
     * @return array
     */
    abstract public function list_all(): Collection;
}
