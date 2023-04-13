<?php

namespace JWWS\WPPF\Template\Template\Template_Test;

use \JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Template\Template\Template,
    Logger\Error_Logger\Error_Logger
};

Security::stop_direct_access();

/**
 */
final class Template_Test extends Test {
    /**
     * @return void
     */
    public static function run(): void {
        $template = Template::of(filename: __DIR__ . '/templates/template')
            ->assign(names: 'data', value: 'Variable')
            ->output()
        ;

        Error_Logger::log(output: $template);

        $template = Template::of(filename: __DIR__ . '/templates/template')
            ->assign(names: ['data', 'x'], value: 'Variable')
            ->output()
        ;

        Error_Logger::log(output: $template);
    }
}
