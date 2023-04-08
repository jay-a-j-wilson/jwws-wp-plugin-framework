<?php

namespace JWWS\WPPF\Common\Utilities;

use JWWS\WPPF\{
    Common\Security\Security,
    Testing\Abstract_Test
};

Security::stop_direct_access();

/**
 */
final class Generic_Test extends Abstract_Test {
    /**
     * @return void
     */
    public static function run(): void {
    }
}
