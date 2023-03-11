<?php

namespace JWWS\WPPF\Tests\Template;

use \JWWS\WPPF\{
    Template\Template_File,
    Log\Error_Log
};

/**
 */
class Template_File_Test {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * @return void
     */
    public static function test(): void {
        Error_Log::print(
            output: Template_File::create(name: __DIR__ . '/templates/template')
                ->get_name(),
        );

        // Error_Log::print(
        //     output: File::create(name: __DIR__ . '/templates/template2')
        //         ->get_name(),
        // );
    }
}
