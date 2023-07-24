<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\WordPress_Assertion\Slug;

/**
 * Provides assertion methods related to WordPress invariants.
 */
final class Slug {
    /**
     * Static factory method.
     */
    public static function of(string $slug): self {
        return new self(
            slug: $slug,
        );
    }

    /**
     * @return void
     */
    private function __construct(private string $slug) {}

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
    public function is_valid(string $message = ''): self {
        if (preg_match(pattern: '/^[a-z0-9-_]+$/', subject: $this->slug)) {
            return $this;
        }

        $error_message[] = "Value '{$this->slug}' must be a valid WordPress slug.";

        if (empty($this->slug)) {
            $error_message[] = 'Cannot be blank.';
        }

        if (preg_match(pattern: '/[A-Z]/', subject: $this->slug)) {
            $error_message[] = 'Cannot contain uppercase letters.';
        }

        if (preg_match(pattern: '/[\s]/', subject: $this->slug)) {
            $error_message[] = 'Cannot contain whitespace.';
        }

        throw new \InvalidArgumentException(
            message: $message ?: implode(separator: ' ', array: $error_message),
        );
    }
}
