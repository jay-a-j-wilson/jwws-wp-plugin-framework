<?php

namespace JWWS\WPPF\Traits\Log;

use JWWS\WPPF\{Common\Security\Security,
    Common\Testing\Tests,
    Common\Testing\Test_Data\Objects\Test_Object,
    Common\Testing\Test_Data\Primitives\Test_Primitive,};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Log_Tests extends Tests {
    use Log;
    use Test_Primitive;

    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::log_Tests();
    }

    /**
     * Undocumented function.
     */
    public static function log_Tests(): void {
        Test_Object::create()->log();
    }
}
