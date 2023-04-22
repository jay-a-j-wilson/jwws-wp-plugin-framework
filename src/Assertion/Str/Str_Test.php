<?php

namespace JWWS\WPPF\Assertion\Str;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
};

Security::stop_direct_access();

/**
 */
final class Str_Test extends Test {
    use Str;

    /**
     * @return void
     */
    public static function run(): void {
    }
}
