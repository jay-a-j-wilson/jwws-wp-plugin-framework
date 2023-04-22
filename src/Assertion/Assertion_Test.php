<?php

namespace JWWS\WPPF\Assertion;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
};

Security::stop_direct_access();

/**
 */
final class Assertion_Test extends Test {
    /**
     * @return void
     */
    public static function run(): void {
        self::boolean();
    }

    /**
     * @return void
     */
    private static function boolean(): void {
        Assertion::of(value: '2')
            ->numeric()
            ->type(type: 'string')
        ;
    }
}
