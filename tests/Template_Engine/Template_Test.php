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
        $template = Template::create(filename: __DIR__ . '/templates/template')
            ->assign(names: 'data', value: 'Variable')
            ->output()
        ;

        Logger::error_log(output: $template);

        $template = Template::create(filename: __DIR__ . '/templates/template')
        ->assign(names: ['data', 'x'], value: 'Variable')
        ->output()
    ;

    Logger::error_log(output: $template);
    }
}
