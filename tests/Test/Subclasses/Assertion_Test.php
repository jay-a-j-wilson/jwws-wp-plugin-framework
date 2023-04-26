<?php

namespace JWWS\WPPF\Tests\Test\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Assertion,
    Tests\Test\Test
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Assertion_Tests extends Test {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::assertion();
    }

    /**
     * Undocumented function.
     */
    private static function assertion(): void {
        Assertion\Tests\Assertion_Test::run();
    }
}
