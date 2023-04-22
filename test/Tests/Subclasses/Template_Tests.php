<?php

namespace JWWS\WPPF\Test\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Template\Template_Test,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Template_Tests extends Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        self::template();
    }

    /**
     * Undocumented function.
     */
    private static function template(): void {
        Template_Test\Template_Test::run();
    }
}
