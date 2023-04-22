<?php

namespace JWWS\WPPF\Assertion\Comparison;

use JWWS\WPPF\{
    Common\Security\Security,
};

Security::stop_direct_access();

/**
 * Povides assertion methods related to comparing values.
 */
trait Comparison {
    /**
     * Asserts value is true.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     *
     * @retun self
     */
    public function true(string $message = ''): self {
        if ($this->value === true) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Value must be true.',
        );
    }

    /**
     * Asserts value is false.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     *
     * @retun self
     */
    public function false(string $message = ''): self {
        if ($this->value === false) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Value must be false.',
        );
    }

    /**
     * Asserts value is empty.
     *
     * @param string $message a custom message to include in the exception if
     *                        the assertion fails
     *
     * @throws \InvalidArgumentException if the value is empty or null
     *
     * @return self
     */
    public function empty(string $message = ''): self {
        if (empty($this->value)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Value must be empty.',
        );
    }

    /**
     * Asserts value is not empty or null.
     *
     * @param string $message a custom message to include in the exception if
     *                        the assertion fails
     *
     * @throws \InvalidArgumentException if the value is empty or null
     *
     * @return self
     */
    public function not_empty(string $message = ''): self {
        if (! empty($this->value)) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Value must not be empty.',
        );
    }

    /**
     * Asserts value is null.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the value is not null
     *
     * @return self
     */
    public function null(string $message = ''): self {
        if ($this->value === null) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Value must be null.',
        );
    }

    /**
     * Asserts value is not null.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the value is null
     *
     * @return self
     */
    public function not_null(string $message = ''): self {
        if ($this->value !== null) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Value must not be null.',
        );
    }

    /**
     * Asserts value is the same as a specified value.
     *
     * @param mixed  $value   the expected value
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     *
     * @return self
     */
    public function same(mixed $value, string $message = ''): self {
        if ($this->value === $value) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "{$this->value} must be the same as {$value}.",
        );
    }

    /**
     * Asserts value is equal to a specified expected value.
     *
     * @param mixed  $value   the expected value
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     *
     * @return self
     */
    public function equal(mixed $value, string $message = ''): self {
        if ($this->value == $value) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "{$this->value} must be equal to {$value}.",
        );
    }

    /**
     * Asserts value is greater than a specified minimum value.
     *
     * @param mixed  $min     the minimum value
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     *
     * @return self
     */
    public function greater_than(mixed $min, string $message = ''): self {
        if ($this->value > $min) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "{$this->value} must be greater than {$min}.",
        );
    }

    /**
     * Asserts value is greater than or equal to a specified minimum value.
     *
     * @param mixed  $min     the minimum value
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     *
     * @return self
     */
    public function greater_than_or_equal(mixed $min, string $message = ''): self {
        if ($this->value >= $min) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "{$this->value} must be greater than or equal {$min}.",
        );
    }

    /**
     * Asserts value is less than a specified maximum value.
     *
     * @param mixed  $max     the maximum value
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     *
     * @return self
     */
    public function less_than(mixed $max, string $message = ''): self {
        if ($this->value < $max) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "{$this->value} must be less than {$max}.",
        );
    }

    /**
     * Asserts value is less than or equal to a specified maximum value.
     *
     * @param mixed  $max     the maximum value
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     *
     * @return self
     */
    public function less_than_or_equal(mixed $max, string $message = ''): self {
        if ($this->value <= $max) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: "{$this->value} must be less than or equal {$max}.",
        );
    }
}
