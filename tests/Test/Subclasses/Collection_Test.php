<?php

namespace JWWS\WPPF\Tests\Test\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Collection,
    Tests\Test\Test
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Collection_Test extends Test {
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
        Collection\Tests\Collection_Test::run();
    }
}
