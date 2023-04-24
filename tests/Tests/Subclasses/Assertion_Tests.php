<?php

namespace JWWS\WPPF\Tests\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Assertion,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Assertion_Tests extends Tests {
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
        Assertion\Assertion_Tests::run();
    }
}
