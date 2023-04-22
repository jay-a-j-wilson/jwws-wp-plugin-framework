<?php

namespace JWWS\WPPF\Test;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Test\Tests\Subclasses\{
    Assertion_Tests,
    Collection_Tests,
    Filepath_Tests,
    Loader_Tests,
    Logger_Tests,
    Template_Tests,
    Traits_Tests,
    WooCommerce_Tests,
    WordPress_Tests
};

Security::stop_direct_access();

/**
 */
final class Test {
    /**
     * @return void
     */
    public static function run(): void {
        // Assertion_Tests::run();
        // Collection_Tests::run();
        // Filepath_Tests::run();
        Loader_Tests::run();
        // Logger_Tests::run();
        // Template_Tests::run();
        // Traits_Tests::run();
        // WooCommerce_Tests::run();
        // WordPress_Tests::run();
    }
}
