<?php

namespace JWWS\WPPF\Test\Tests\Subclasses;

use JWWS\WPPF\{
    Common\Security\Security,
    Filepath,
    Test\Tests\Tests
};

Security::stop_direct_access();

/**
 */
final class Filepath_Tests extends Tests {
    /**
     */
    public static function run(): void {
        self::unconfirmed_filepath();
        self::confirmed_filepath();
        self::entire_directory();
        self::immediate_directory();
        self::factory();
        self::php_ext();
        self::html_ext();
    }

    /**
     */
    private static function unconfirmed_filepath(): void {
        Filepath\Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath_Test::run();
    }

    /**
     */
    private static function confirmed_filepath(): void {
        Filepath\Subclasses\Confirmed_Filepath\Confirmed_Filepath_Test::run();
    }

    /**
     */
    private static function entire_directory(): void {
        Filepath\Sub_Value_Objects\Directory\Subclasses\Entire_Directory\Entire_Directory_Test::run();
    }

    /**
     */
    private static function immediate_directory(): void {
        Filepath\Sub_Value_Objects\Directory\Subclasses\Immediate_Directory\Immediate_Directory_Test::run();
    }

    /**
     */
    private static function factory(): void {
        Filepath\Sub_Value_Objects\File\Factory\Factory_Test::run();
    }

    /**
     */
    private static function php_ext(): void {
        Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\PHP_Ext\PHP_Ext_Test::run();
    }

    /**
     */
    private static function html_ext(): void {
        Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Ext\Subclasses\HTML_Ext\HTML_Ext_Test::run();
    }
}
