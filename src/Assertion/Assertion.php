<?php

namespace JWWS\WPPF\Assertion;

use JWWS\WPPF\{
    Common\Security\Security,
    Assertion\Traits\Comparison\Comparison,
    Assertion\Traits\File\File,
    Assertion\Traits\Str\Str,
    Assertion\Traits\Type\Type,
};

// Security::stop_direct_access();

/**
 * Provides assertion methods.
 */
final class Assertion {
    use Comparison,
        File,
        Str,
        Type;

    /**
     * Static factory method.
     */
    public static function of(mixed $value): self {
        return new self(
            value: $value,
        );
    }

    /**
     * Enforces construction with static factory method.
     */
    private function __construct(private mixed $value) {
    }
}
