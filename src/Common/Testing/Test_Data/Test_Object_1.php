<?php

namespace JWWS\WPPF\Common\Testing\Test_Data;

use JWWS\WPPF\{
    Common\Security\Security,
    Traits\Log\Log
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Test_Object_1 {
    use Log;

    /**
     * Undocumented function.
     */
    public static function create(): self {
        return new self();
    }

    /**
     * Undocumented function.
     */
    private function __construct(private int $int = 1) {
    }
}
