<?php

namespace JWWS\WPPF\Tests\Template_Engine;

use \JWWS\WPPF\{
    Template_Engine\File,
    Logger
};

/**
 */
class File_Test {
    /**
     * Do not instantiate.
     */
    private function __construct() {
    }

    /**
     * @return void
     */
    public static function test(): void {
        Logger::error_log(
            output: File::create(name: __DIR__ . '/templates/template')
                ->get_name(),
        );

        // Logger::error_log(
        //     output: File::create(name: __DIR__ . '/templates/template2')
        //         ->get_name(),
        // );
    }
}
