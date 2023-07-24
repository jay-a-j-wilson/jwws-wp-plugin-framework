<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Array_Assertion;

/**
 * Provides assertion methods related to array values.
 */
final class Array_Assertion {
    /**
     * Static factory method.
     */
    public static function of(array $array): self {
        return new self(
            array: $array,
        );
    }

    /**
     * @return void
     */
    private function __construct(private array $array) {}

    /**
     * Asserts array is empty.
     *
     * @param string $message a custom message to include in the exception if
     *                        the assertion fails
     *
     * @throws \InvalidArgumentException if the value is empty or null
     */
    public function is_empty(string $message = ''): self {
        if (empty($this->array)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Array must be empty.',
        );
    }

    /**
     * Asserts array is not empty or null.
     *
     * @param string $message a custom message to include in the exception if
     *                        the assertion fails
     *
     * @throws \InvalidArgumentException if the value is empty or null
     */
    public function is_not_empty(string $message = ''): self {
        if (! empty($this->array)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Array must not be empty.',
        );
    }

    /**
     * Asserts array contains the specified value.
     *
     * @param array  $value   the value to search for
     * @param string $message Optional. The message to include if the
     *                        assertion fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function contains_value(mixed $value, string $message = ''): self {
        if (in_array(haystack: $this->array, needle: $value, strict: true)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Array must contain '{$value}'.",
        );
    }

    /**
     * Asserts array contains the specified key.
     *
     * @param array  $key     the key to search for
     * @param string $message Optional. The message to include if the
     *                        assertion fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function contains_key(int|string $key, string $message = ''): self {
        if (array_key_exists($key, array: $this->array)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Array must contain '{$key}'.",
        );
    }
}
