<?php

namespace JWWS\WPPF\Test\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 */
final class Loader_Tests extends Tests {
    /**
     * @return void
     */
    public static function run(): void {
        // self::basename();
        // self::name_header();
        // self::description_header();
        // self::version_header();
        // self::path();
        self::plugin();
    }

    /**
     * @return void
     */
    private static function basename(): void {
        Loader\Plugin\Value_Objects\Basename\Basename_Test::run();
    }

    /**
     * @return void
     */
    private static function name_header(): void {
        Loader\Plugin\Value_Objects\Header\Subclasses\Name_Header\Name_Header_Test::run();
    }

    /**
     * @return void
     */
    private static function description_header(): void {
        Loader\Plugin\Value_Objects\Header\Subclasses\Description_Header\Description_Header_Test::run();
    }

    /**
     * @return void
     */
    private static function version_header(): void {
        Loader\Plugin\Value_Objects\Header\Subclasses\Version_Header\Version_Header_Test::run();
    }

    /**
     * @return void
     */
    private static function path(): void {
        Loader\Plugin\Value_Objects\Path\Path_Test::run();
    }

    /**
     * @return void
     */
    private static function plugin(): void {
        Loader\Plugin\Plugin_Test::run();
    }
}
