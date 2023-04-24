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
final class User {
    use Log;

    /**
     * Factory method.
     */
    public static function of(int $id, Name $name): self {
        return new self(
            id: $id,
            name: $name,
        );
    }

    /**
     * Enforces use of factory method.
     */
    private function __construct(
        public readonly int $id,
        public readonly Name $name,
    ) {
    }
}
