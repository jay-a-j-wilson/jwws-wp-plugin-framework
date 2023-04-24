<?php

namespace JWWS\WPPF\Template\Template_Tests;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Tests,
    Template\Template,
    Logger\Error_Logger\Error_Logger};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Template_Tests extends Tests {
    /**
     * Undocumented function.
     */
    public static function run(): void {
        $template = Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(names: 'data', value: 'Variable')
            ->output()
        ;

        Error_Logger::log(output: $template);

        $template = Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(names: ['data', 'x'], value: 'Variable')
            ->output()
        ;

        Error_Logger::log(output: $template);
    }
}
