<?php

namespace JWWS\WPPF\Assertion\Tests;

use JWWS\WPPF\Assertion\Assertion;
use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Tests,
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Assertion_Tests extends Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::boolean();
    }

    /**
     * Undocumented function.
     */
    private static function boolean(): void {
        Assertion::of(value: '2')
            ->numeric()
            ->type(type: 'string')
        ;
    }
}
