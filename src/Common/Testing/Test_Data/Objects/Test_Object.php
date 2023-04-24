<?php

namespace JWWS\WPPF\Common\Testing\Test_Data\Objects;

use JWWS\WPPF\{Common\Security\Security, Traits\Log\Log};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Test_Object {
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
    private function __construct(
        private int $int = 123,
        private string $string = 'abc',
    ) {
    }
}
