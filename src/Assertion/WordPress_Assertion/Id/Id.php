<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\WordPress_Assertion\Id;

/**
 * Provides assertion methods related to WordPress Ids.
 */
final class Id {
    /**
     * Static factory method.
     */
    public static function of(int $id): self {
        return new self(
            id: $id,
        );
    }

    /**
     * @return void
     */
    private function __construct(private int $id) {}

    /**
     * Asserts value is a valid WordPress slug.
     *
     * Ids must be a positive number.
     *
     * @param string $message a custom message to include in the exception if
     *                        the assertion fails
     *
     * @throws \InvalidArgumentException
     */
    public function is_valid(string $message = ''): self {
        if ($this->id > 0) {
            return $this;
        }

        $error_message[] = "Value '{$this->id}' must be a valid WordPress id.";

        if ($this->id === 0) {
            $error_message[] = 'Cannot be zero.';
        }

        if ($this->id < 0) {
            $error_message[] = 'Cannot be a negative number.';
        }

        throw new \InvalidArgumentException(
            message: $message ?: implode(separator: ' ', array: $error_message),
        );
    }
}
