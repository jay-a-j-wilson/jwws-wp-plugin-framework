<?php

namespace JWWS\WPPF\Common\Testing\Test_Data\Objects\Value_Objects;

use JWWS\WPPF\{
    Common\Security\Security,
    Traits\Log\Log
};

// Security::stop_direct_access();

/**
 * Testing object.
 */
final class Name {
    use Log;

    /**
     * Factory method.
     */
    public static function of(string $first, string $last): self {
        return new self(
            first: $first,
            last: $last,
        );
    }

    /**
     * Enforces use of factory method.
     */
    private function __construct(
        public readonly string $first,
        public readonly string $last,
    ) {
    }
}
