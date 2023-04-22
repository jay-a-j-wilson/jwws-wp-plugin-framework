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
 * Provides assertion methods.
 */
final class Assertion {
    use Comparison,
        File,
        Str,
        Type;

    /**
     * @param mixed $value
     *
     * @return self
     */
    public static function of(mixed $value): self {
        return new self(
            value: $value,
        );
    }

    /**
     * @param mixed $value the value to assert
     */
    private function __construct(private mixed $value) {
    }
}
