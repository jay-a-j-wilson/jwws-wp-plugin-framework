<?php

namespace JWWS\WPPF\Assertion;

use JWWS\WPPF\{
    Common\Security\Security,
    Assertion\Comparison\Comparison,
    Assertion\File\File,
    Assertion\Str\Str,
    Assertion\Type\Type
};

Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Assertion {
    use Comparison,
        File,
        Str,
        Type;

    /**
     * Undocumented function.
     */
    public static function of(mixed $value): self {
        return new self(
            value: $value,
        );
    }

    /**
     * Undocumented function.
     */
    private function __construct(private mixed $value) {
    }
}
