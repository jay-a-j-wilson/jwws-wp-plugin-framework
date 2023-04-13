<?php

namespace JWWS\WPPF\Common\Utility;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test
};

Security::stop_direct_access();

/**
 */
final class Generic_Test extends Test {
    /**
     * @return void
     */
    public static function run(): void {
    }
}
