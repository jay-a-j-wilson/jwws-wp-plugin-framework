<?php

namespace JWWS\WPPF\Template\Template_File\Template_File_Test;

use \JWWS\WPPF\{
    Security\Security,
    Testing\Abstract_Test,
    Template\Template_File\Template_File,
    Logger\Error_Logger\Error_Logger,
};

Security::stop_direct_access();

/**
 */
final class Template_File_Test extends Abstract_Test {
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
            output: Template_File::create_from(name: __DIR__ . '/templates/template')
                ->get_name(),
        );
    }
}
