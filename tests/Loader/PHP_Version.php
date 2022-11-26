<?php

namespace JWWS\WP_Plugin_Framework\Tests\Loader;

require __DIR__ . '/../../vendor/autoload.php';

/**
 *
 */
class PHP_Version {
    /**
     * @return void
     */
    public static function test(): void {
        $php_version = (new \JWWS\WP_Plugin_Framework\Loader\PHP_Version(
            min: '7',
            max: '8',
        ));

        echo $php_version->get_min();
        echo $php_version->get_max();
    }
}

PHP_Version::test();
