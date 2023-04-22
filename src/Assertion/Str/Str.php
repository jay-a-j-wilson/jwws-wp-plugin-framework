<?php

namespace JWWS\WPPF\Assertion\Str;

use JWWS\WPPF\{
    Common\Security\Security,
};

Security::stop_direct_access();

/**
 * Provides assertion methods related to string values.
 */
trait Str {
    /**
     * Asserts value contains a specified substring.
     *
     * @param string $needle  the substring to search for
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function contains(string $needle, string $message = ''): self {
        if (str_contains(haystack: $this->value, needle: $needle)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Value '{$this->value}' must contain '{$needle}'.",
        );
    }

    /**
     * Asserts value starts with a specified prefix.
     *
     * @param string $prefix  the prefix to check for
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function starts_with(string $prefix, string $message = ''): self {
        if (str_starts_with(haystack: $this->value, needle: $prefix)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Value '{$this->value}' must start with '{$prefix}'.",
        );
    }

    /**
     * Asserts string value ends with a specified suffix.
     *
     * @param string $suffix  the suffix to check for
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function ends_with(string $suffix, string $message = ''): self {
        if (str_ends_with(haystack: $this->value, needle: $suffix)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Value '{$this->value}' must end with '{$suffix}'.",
        );
    }
}
