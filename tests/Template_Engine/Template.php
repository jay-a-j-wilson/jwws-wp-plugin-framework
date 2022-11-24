<?php

namespace JWWS\WP_Plugin_Framework\Tests\Template_Engine;

/**
 * @package JWWS\WP_Plugin_Framework\Tests\Template_Engine
 */
class Template {
    /**
     * @return void 
     */
    public function init(): void {
        echo (new \JWWS\WP_Plugin_Framework\Template_Engine\Template(filename: __DIR__ . '/templates/template'))
            ->output()
        ;
    }
}


(new Template())->init();