<?php

namespace JWWS\WPPF\Assertion\Comparison;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
};

Security::stop_direct_access();

/**
 */
final class Comparison_Test extends Test {
    use Comparison;

    /**
     * @return void
     */
    public static function run(): void {
    }
}
