<?php

namespace JWWS\WP_Plugin_Framework\Tests\Template_Engine;

require __DIR__ . '/../../vendor/autoload.php';

/**
 * 
 */
class Template {
    /**
     * @return void
     */
    public static function test(): void {
        echo (new \JWWS\WP_Plugin_Framework\Template_Engine\Template(filename: __DIR__ . '/templates/template'))
            ->output()
        ;
    }
}

// Template::test();