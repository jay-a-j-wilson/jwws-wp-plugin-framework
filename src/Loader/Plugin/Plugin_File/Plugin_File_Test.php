<?php

namespace JWWS\WPPF\Loader\Plugin\Plugin_File;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
};

Security::stop_direct_access();

/**
 */
final class Plugin_File_Test extends Test {
    /**
     * @return void
     */
    public static function run(): void {
    }
}
