<?php

namespace JWWS\WPPF\Assertion;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Assertion_Test extends Test {
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
