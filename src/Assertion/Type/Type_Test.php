<?php

namespace JWWS\WPPF\Assertion\Type;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
};

Security::stop_direct_access();

/**
 */
final class Type_Test extends Test {
    use Type;

    /**
     * @return void
     */
    public static function run(): void {
    }
}
