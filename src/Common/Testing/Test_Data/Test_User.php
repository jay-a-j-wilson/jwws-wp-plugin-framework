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
final class Test_User {
    use Log;

    /**
     * Undocumented function.
     */
    public static function of(
        int $id,
        string $first_name,
        string $last_name,
    ): self {
        return new self(
            id: $id,
            first_name: $first_name,
            last_name: $last_name,
        );
    }

    /**
     * Undocumented function.
     */
    private function __construct(
        private int $id,
        public string $first_name,
        private string $last_name,
    ) {
    }

    /**
     * Undocumented function.
     */
    public function get_id(): int {
        return $this->id;
    }

    /**
     * Undocumented function.
     */
    public function get_first_name(): string {
        return $this->first_name;
    }

    /**
     * Undocumented function.
     */
    public function get_last_name(): string {
        return $this->last_name;
    }
}
