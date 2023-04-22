<?php

namespace JWWS\WPPF\Assertion\File;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
};

Security::stop_direct_access();

/**
 */
final class File_Test extends Test {
    use File;
    
    /**
     * @return void
     */
    public static function run(): void {
    }
}
