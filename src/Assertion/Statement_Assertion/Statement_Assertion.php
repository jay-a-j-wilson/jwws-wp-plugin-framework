<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Statement_Assertion;

final class Statement_Assertion {
    /**
     * Static factory method.
     */
    public static function of(mixed $statement): self {
        return new self(
            statement: $statement,
        );
    }

    /**
     * @param string $string The statement to be tested
     */
    private function __construct(private mixed $statement) {
    }

    /**
     * Asserts statement is true.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function true(string $message = ''): self {
        if ($this->statement == true) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Statement must be true.',
        );
    }

    /**
     * Asserts statement is not true.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function not_true(string $message = ''): self {
        if ($this->statement != true) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Statement must not be true.',
        );
    }

    /**
     * Asserts statement is false.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function false(string $message = ''): self {
        if ($this->statement == false) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Statement must be false.',
        );
    }

    /**
     * Asserts statement is not false.
     *
     * @param string $message Optional. The message to include if the assertion
     *                        fails.
     *
     * @throws \InvalidArgumentException if the assertion fails
     */
    public function not_false(string $message = ''): self {
        if ($this->statement != false) {
            return $this;
        }

        throw new \InvalidArgumentException(
            message: $message ?: 'Statement must not be false.',
        );
    }
}
