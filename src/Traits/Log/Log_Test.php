<?php

namespace JWWS\WPPF\Traits\Log;

use JWWS\WPPF\{
    Security\Security,
    Testing\Abstract_Test,
    Testing\Test_Primitive,
    Testing\Test_Object
};

Security::stop_direct_access();

/**
 */
final class Log_Test extends Abstract_Test {
    use Log;
    use Test_Primitive;

    /**
     * @return void
     */
    public static function run(): void {
        self::log_test();
    }

    /**
     * @return void
     */
    public static function log_test(): void {
        Test_Object::create()->log();
    }
}
