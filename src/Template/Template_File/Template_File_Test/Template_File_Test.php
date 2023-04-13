<?php

namespace JWWS\WPPF\Template\Template_File\Template_File_Test;

use \JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Template\Template_File\Template_File,
    Logger\Error_Logger\Error_Logger,
};

Security::stop_direct_access();

/**
 */
final class Template_File_Test extends Test {
    /**
     * @return void
     */
    public static function run(): void {
        self::get_name();
    }

    /**
     * @return void
     */
    public static function get_name(): void {
        Error_Logger::log(
            output: Template_File::of(name: __DIR__ . '/templates/template')
                ->get_name(),
        );
    }
}
