<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Number_Assertion;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 *  Provides assertion methods related to number.
 */
final class Number_Assertion {
    /**
     * Static factory method.
     */
    public static function of(int|float $number): self {
        return new self(
            number: $number,
        );
    }

    /**
     * @return void
     */
    private function __construct(private int|float $number) {}

    /**
     * Asserts number is a positive number.
     *
     * @param string $message Optional. The message to include if the
     *                        assertion fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_positive(string $message = ''): self {
        if ($this->number > 0) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Number {$this->number} must be positive.",
        );
    }

    /**
     * Asserts number is a negative number.
     *
     * @param string $message Optional. The message to include if the
     *                        assertion fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_negative(string $message = ''): self {
        if ($this->number < 0) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Number {$this->number} must be negative.",
        );
    }

    /**
     * Asserts number is and even number.
     *
     * @param string $message Optional. The message to include if the
     *                        assertion fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_even(string $message = ''): self {
        if ($this->number % 2 == 0) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Number {$this->number} must be even",
        );
    }

    /**
     * Asserts number is and odd number.
     *
     * @param string $message Optional. The message to include if the
     *                        assertion fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_odd(string $message = ''): self {
        if ($this->number % 2 != 0) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Number {$this->number} must be odd",
        );
    }

    /**
     * Asserts value is equal to given value.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_equal(int|float $value, string $message = ''): self {
        if ($this->number == $value) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Number {$this->number} must be equal to {$value}.",
        );
    }

    /**
     * Asserts value is less than or equal to a given value.
     *
     * @param mixed  $max     the maximum value
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_less_or_equal(int|float $max, string $message = ''): self {
        if ($this->number <= $max) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Number {$this->number} must be less than or equal {$max}.",
        );
    }

    /**
     * Asserts value is greater than or equal to a given value.
     *
     * @param mixed  $min     the minimum value
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_greater_or_equal(int|float $min, string $message = ''): self {
        if ($this->number >= $min) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "{$this->number} must be greater than or equal {$min}.",
        );
    }

    /**
     * Asserts number is less than given value.
     *
     * @param string $message Optional. The message to include if the
     *                        assertion fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_less(int|float $max, string $message = ''): self {
        if ($this->number < $max) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Number {$this->number} must be less than {$max}.",
        );
    }

    /**
     * Asserts number is greater than given value.
     *
     * @param string $message Optional. The message to include if the
     *                        assertion fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_greater(int|float $min, string $message = ''): self {
        if ($this->number > $min) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "Number {$this->number} must be greater than {$min}",
        );
    }

    /**
     * Asserts number is between given numbers (inclusive).
     *
     * @param string $message Optional. The message to include if the
     *                        assertion fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function is_between(
        int|float $min,
        int|float $max,
        string $message = '',
    ): self {
        if ($max >= $min && $this->number >= $min && $this->number <= $max) {
            return $this;
        }

        if ($max < $min) {
            $error_message[] = "max: {$max} cannot be less than min: {$min}.";
        }

        if ($this->number < $min) {
            $error_message[] = "{$this->number} cannot be less than min: {$min}.";
        }

        if ($this->number > $max) {
            $error_message[] = "{$this->number} cannot be greater than max: {$max}.";
        }

        throw new \InvalidArgumentException(
            message: $message ?: implode(separator: ' ', array: $error_message),
        );
    }
}
