<?php

namespace JWWS\WPPF\Traits\Log;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Common\Testing\Test_Data\Test_Primitive,
    Common\Testing\Test_Data\Test_Object,
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Log_Test extends Test {
    use Log;
    use Test_Primitive;

    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::log_test();
    }

    /**
     * Undocumented function.
     */
    public static function log_test(): void {
        Test_Object::create()->log();
    }
}
