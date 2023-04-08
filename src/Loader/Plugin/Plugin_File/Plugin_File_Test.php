<?php

namespace JWWS\WPPF\Loader\Plugin\Plugin_File;

use JWWS\WPPF\{
    Security\Security,
    Testing\Abstract_Test,
};

Security::stop_direct_access();

/**
 */
final class Plugin_File_Test extends Abstract_Test {
    /**
     * @return void
     */
    public static function run(): void {
    }
}
