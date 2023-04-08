<?php

namespace JWWS\WPPF\Common\Testing;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 */
interface Test {
    /**
     * @return static
     */
    public static function run(): void;
}
