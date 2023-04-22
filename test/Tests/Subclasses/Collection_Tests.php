<?php

namespace JWWS\WPPF\Test\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Collection\Collection_Test,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 */
final class Collection_Tests extends Tests {
    /**
     * @return void
     */
    public static function run(): void {
        self::collection();
    }

    /**
     * @return void
     */
    private static function collection(): void {
        Collection_Test::run();
    }
}
