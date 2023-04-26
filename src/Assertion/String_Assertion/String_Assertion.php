<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion;

/**
 * Provides assertion methods related to string values.
 */
final class String_Assertion {
    /**
     * Static factory method.
     */
    public static function of(string $string): self {
        return new self(
            string: $string,
        );
    }

    /**
     * @param string $string The string to be tested
     */
    private function __construct(private string $string) {
    }

    /**
     * Asserts string is empty.
     *
     * @param string $message a custom message to include in the exception if
     *                        the assertion fails
     *
     * @throws \InvalidArgumentException if the value is empty or null
     */
    public function empty(string $message = ''): self {
        if (empty($this->string) && $this->string !== '0') {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "String '{$this->string}' must be empty.",
        );
    }

    /**
     * Asserts string is not empty or null.
     *
     * @param string $message a custom message to include in the exception if
     *                        the assertion fails
     *
     * @throws \InvalidArgumentException if the value is empty or null
     */
    public function not_empty(string $message = ''): self {
        if (! empty($this->string) || $this->string === '0') {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "String '{$this->string}' must not be empty.",
        );
    }

    /**
     * Asserts string is equal to a specified value.
     *
     * @param string $string  The expected value
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException
     */
    public function equals(string $string, string $message = ''): self {
        if ($this->string === $string) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "String '{$this->string}' is not equal to '{$string}'.",
        );
    }

    /**
     * Asserts string contains a specified substring.
     *
     * @param string $substring the substring to search for
     * @param string $message   Optional. The message to include if the assertion
     *                          fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function contains(string $substring, string $message = ''): self {
        if (str_contains(haystack: $this->string, needle: $substring)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "String '{$this->string}' must contain '{$substring}'.",
        );
    }

    /**
     * Asserts string starts with a specified prefix.
     *
     * @param string $prefix  the prefix to check for
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function starts_with(string $prefix, string $message = ''): self {
        if (str_starts_with(haystack: $this->string, needle: $prefix)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "String '{$this->string}' must start with '{$prefix}'.",
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
        if (str_ends_with(haystack: $this->string, needle: $suffix)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "String '{$this->string}' must end with '{$suffix}'.",
        );
    }

    /**
     * Asserts string is alphabetic.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function alphabetic(string $message = ''): self {
        if (ctype_alpha($this->string)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Value '{$this->string}' must be alphabetic.",
        );
    }
}
