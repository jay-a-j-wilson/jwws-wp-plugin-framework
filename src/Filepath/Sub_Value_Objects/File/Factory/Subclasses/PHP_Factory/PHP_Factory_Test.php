<?php

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Factory\Subclasses\PHP_Factory;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Logger\Error_Logger\Error_Logger,
    Filepath\Sub_Value_Objects\File\Factory\Subclasses\PHP_Factory\PHP_Factory,
    Filepath\Sub_Value_Objects\File\Factory\Subclasses\PHP_Factory\CSS_Factory

};

Security::stop_direct_access();

/**
 */
final class PHP_Factory_Test extends Test {
    /**
     * @return void
     */
    public static function run(): void {
        self::of_php(path: 'dir/subdir/filename.php');
        self::of_php(path: 'dir/subdir/filename.css');
    }

    /**
     * @param string $path
     *
     * @return void
     */
    private static function of_php(string $path): void {
        Error_Logger::log(
            output: PHP_Factory::of(path: $path)->value(),
        );
    }
}
