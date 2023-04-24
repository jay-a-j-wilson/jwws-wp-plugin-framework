<?php

namespace JWWS\WPPF\Tests\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Collection,
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
        Collection\Collection_Tests::run();
    }
}
