<?php

namespace JWWS\WPPF\Tests\Test;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 * Undocumented class.
 */
abstract class Test {
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
