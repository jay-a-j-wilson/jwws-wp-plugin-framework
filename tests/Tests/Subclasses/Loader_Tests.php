<?php

namespace JWWS\WPPF\Tests\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Loader_Tests extends Tests {
    /**
     * Undocumented function.
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
     * Undocumented function.
     */
    private static function basename(): void {
        Loader\Plugin\Value_Objects\Basename\Basename_Tests::run();
    }

    /**
     * Undocumented function.
     */
    private static function name_header(): void {
        Loader\Plugin\Value_Objects\Header\Subclasses\Name_Header\Name_Header_Tests::run();
    }

    /**
     * Undocumented function.
     */
    private static function description_header(): void {
        Loader\Plugin\Value_Objects\Header\Subclasses\Description_Header\Description_Header_Tests::run();
    }

    /**
     * Undocumented function.
     */
    private static function version_header(): void {
        Loader\Plugin\Value_Objects\Header\Subclasses\Version_Header\Version_Header_Tests::run();
    }

    /**
     * Undocumented function.
     */
    private static function path(): void {
        Loader\Plugin\Value_Objects\Path\Path_Tests::run();
    }

    /**
     * Undocumented function.
     */
    private static function plugin(): void {
        Loader\Plugin\Plugin_Tests::run();
    }
}
