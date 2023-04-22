<?php

namespace JWWS\WPPF\Test\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Collection\Collection_Test,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Collection_Tests extends Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::collection();
    }

    /**
     * Undocumented function.
     */
    private static function collection(): void {
        Collection_Test::run();
    }
}
