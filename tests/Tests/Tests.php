<?php

namespace JWWS\WPPF\Test\Tests;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 * Undocumented class.
 */
abstract class Tests {
    /**
     * Do not instantiate.
     *
     * @return void
     */
    protected function __construct() {
    }

    /**
     * Undocumented function.
     */
    abstract public static function run(): void;
}
