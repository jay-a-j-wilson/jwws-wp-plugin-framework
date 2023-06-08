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
     * @return void
     */
    private function __construct(private string $string) {
    }

    /**
     * Asserts string is alphabetic.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_alphabetic(string $message = ''): self {
        if (ctype_alpha(text: $this->string)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Value '{$this->string}' must be alphabetic.",
        );
    }

    /**
     * Asserts string is alphanumeric.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_alphanumeric(string $message = ''): self {
        if (ctype_alnum(text: $this->string)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Value '{$this->string}' must be alphanumeric.",
        );
    }

    /**
     * Asserts string is empty.
     *
     * @param string $message a custom message to include in the exception if
     *                        the assertion fails
     *
     * @throws \InvalidArgumentException if the value is empty or null
     */
    public function is_empty(string $message = ''): self {
        if (empty($this->string) && $this->string !== '0') {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "String '{$this->string}' must be empty.",
        );
    }

    /**
     * Asserts string is not empty.
     *
     * @param string $message a custom message to include in the exception if
     *                        the assertion fails
     *
     * @throws \InvalidArgumentException if the value is empty or null
     */
    public function is_not_empty(string $message = ''): self {
        if (! empty($this->string) || $this->string === '0') {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "String '{$this->string}' must not be empty.",
        );
    }

    /**
     * Asserts string is equal to a given value.
     *
     * @param mixed  $value   The expected value
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException
     */
    public function is_equal(mixed $value, string $message = ''): self {
        if ($this->string == $value) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "String '{$this->string}' must be equal to '{$value}'.",
        );
    }

    /**
     * Asserts string contains a given substring.
     *
     * @param string $substring the substring to search for
     * @param string $message   Optional. The message to include if the
     *                          assertion fails.
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
     * Asserts string starts with a given prefix.
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
     * Asserts string value ends with a given suffix.
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
}
