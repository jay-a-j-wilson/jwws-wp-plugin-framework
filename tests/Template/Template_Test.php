<?php

namespace JWWS\WPPF\Tests\Template;

use \JWWS\WPPF\{
    Template\Template,
    Log\Error_Log
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

        Error_Log::print(output: $template);

        $template = Template::create(filename: __DIR__ . '/templates/template')
            ->assign(names: ['data', 'x'], value: 'Variable')
            ->output()
        ;

        Error_Log::print(output: $template);
    }
}
