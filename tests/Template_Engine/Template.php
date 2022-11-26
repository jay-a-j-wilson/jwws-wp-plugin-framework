<?php

namespace JWWS\WP_Plugin_Framework\Tests\Template_Engine;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * 
 */
class Template {
    /**
     * @return string
     */
    public static function test(): string {
        return (new \JWWS\WP_Plugin_Framework\Template_Engine\Template(filename: __DIR__ . '/templates/template'))
            ->output()
        ;
    }
}