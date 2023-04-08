<?php

namespace JWWS\WPPF\Common\Testing\Test_Data;

use JWWS\WPPF\{
    Common\Security\Security,
    Traits\Log\Log
};

Security::stop_direct_access();

/**
 */
class Test_Object {
    use Log;

    /**
     * @var JWWS\WPPF\Testing\create
     */
    public static function create(): self {
        return new self();
    }

    /**
     * @return void
     */
    private function __construct() {
    }

    /**
     * @var int
     */
    private int $int = 123;

    /**
     * @var string
     */
    private string $string = 'abc';
}
