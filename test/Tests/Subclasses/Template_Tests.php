<?php

namespace JWWS\WPPF\Test\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Template\Template_Test,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 */
final class Template_Tests extends Tests {
    /**
     * @return void
     */
    public static function run(): void {
        self::template();
    }

    /**
     * @return void
     */
    private static function template(): void {
        Template_Test\Template_Test::run();
    }
}
