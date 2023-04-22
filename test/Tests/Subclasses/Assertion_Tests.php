<?php

namespace JWWS\WPPF\Test\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Assertion\Assertion_Test,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 */
final class Assertion_Tests extends Tests {
    /**
     * @return void
     */
    public static function run(): void {
        self::assertion();
    }

    /**
     * @return void
     */
    private static function assertion(): void {
        Assertion_Test::run();
    }
}
