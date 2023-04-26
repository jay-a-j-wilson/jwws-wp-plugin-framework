<?php

namespace JWWS\WPPF\Tests;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Tests\Test\Subclasses\{
    Assertion_Test,
    Collection_Test,
    Filepath_Test,
    Loader_Test,
    Logger_Test,
    Template_Test,
    Traits_Test,
    WooCommerce_Test,
    WordPres_Test
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        // Assertion_Test::run();
        // Collection_Test::run();
        Filepath_Test::run();
        // Loader_Test::run();
        // Logger_Test::run();
        // Traits_Test::run();
        // WooCommerce_Test::run();
        // WordPres_Test::run();
    }
}
