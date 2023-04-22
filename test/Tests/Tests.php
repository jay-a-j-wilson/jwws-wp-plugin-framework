<?php

namespace JWWS\WPPF\Test\Tests;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 */
abstract class Tests {
    /**
     * Do not instatiate.
     *
     * @return void
     */
    protected function __construct() {
    }

    /**
     * @return void
     */
    abstract public static function run(): void;
}
