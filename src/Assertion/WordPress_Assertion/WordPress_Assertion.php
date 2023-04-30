<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\WordPress_Assertion;

/**
 * Provides assertion methods related to WordPress invariants.
 */
final class WordPress_Assertion {
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
     * Asserts value is a valid WordPress slug.
     *
     * Slugs can contain:
     * - lowercase letters
     * - numbers
     * - hyphens
     * - underscores
     *
     * @param string $message a custom message to include in the exception if
     *                        the assertion fails
     *
     * @throws \InvalidArgumentException
     */
    public function slug(string $message = ''): self {
        if (preg_match(pattern: '/^[a-z0-9-_]+$/', subject: $this->string)) {
            return $this;
        }

        $error_message[] = "Value '{$this->string}' must be a valid WordPress slug.";

        if (empty($this->string)) {
            $error_message[] = 'Cannot be blank.';
        }

        if (preg_match(pattern: '/[A-Z]/', subject: $this->string)) {
            $error_message[] = 'Cannot contain uppercase letters.';
        }

        if (preg_match(pattern: '/[\s]/', subject: $this->string)) {
            $error_message[] = 'Cannot contain whitespace.';
        }

        throw new \InvalidArgumentException(
            message: $message ?: implode(separator: ' ', array: $error_message),
        );
    }
}
