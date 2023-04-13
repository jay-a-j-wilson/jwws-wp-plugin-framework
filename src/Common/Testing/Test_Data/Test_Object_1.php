<?php

namespace JWWS\WPPF\Common\Testing\Test_Data;

use JWWS\WPPF\{
    Common\Security\Security,
    Traits\Log\Log
};

Security::stop_direct_access();

/**
 */
class Test_Object_1 {
    use Log;

    /**
     */
    public static function create(): self {
        return new self();
    }

    /**
     * @param int $int
     *
     * @return void
     */
    private function __construct(private int $int = 1) {
    }
}
