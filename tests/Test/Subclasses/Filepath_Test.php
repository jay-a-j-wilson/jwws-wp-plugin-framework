<?php

namespace JWWS\WPPF\Tests\Test\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath,
    Tests\Test\Test
};

Security::stop_direct_access();

/**
 */
final class Filepath_Test extends Test {
    /**
     */
    public static function run(): void {
        // self::unconfirmed_filepath();
        self::confirmed_filepath();
        // self::entire_directory();
        // self::immediate_directory();
        // self::factory();
        // self::php_ext();
        // self::html_ext();
    }

    /**
     */
    private static function unconfirmed_filepath(): void {
        Filepath\Subclasses\Unconfirmed_Filepath\Tests\Unconfirmed_Filepath_Test::run();
    }

    /**
     */
    private static function confirmed_filepath(): void {
        Filepath\Subclasses\Confirmed_Filepath\Tests\Confirmed_Filepath_Test::run();
    }

    /**
     */
    private static function entire_directory(): void {
        Filepath\Sub_Value_Objects\Directory\Subclasses\Entire_Directory\Tests\Entire_Directory_Test::run();
    }

    /**
     */
    private static function immediate_directory(): void {
        Filepath\Sub_Value_Objects\Directory\Subclasses\Immediate_Directory\Tests\Immediate_Directory_Test::run();
    }

    /**
     */
    private static function factory(): void {
        Filepath\Sub_Value_Objects\File\Factory\Factory_Tests::run();
    }

    /**
     */
    private static function php_ext(): void {
        Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\PHP_Ext\PHP_Ext_Tests::run();
    }

    /**
     */
    private static function html_ext(): void {
        Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\HTML_Ext\HTML_Ext_Tests::run();
    }
}
