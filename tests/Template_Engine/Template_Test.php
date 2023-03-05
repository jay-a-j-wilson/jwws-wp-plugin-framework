<?php

namespace JWWS\WPPF\Tests\Template_Engine;

use \JWWS\WPPF\{
    Template_Engine\Template,
    Logger
};

/**
 */
class Template_Test {
     /**
     * Do not instantiate.
     */
    private function __construct() {
    }
    
    /**
     * @return void
     */
    public static function test(): void {
        $template = (new Template(filename: __DIR__ . '/templates/template'))
            ->output()
        ;

        Logger::to_error_log(output: $template);
    }
}
