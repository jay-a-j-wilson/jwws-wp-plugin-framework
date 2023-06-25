<?php declare(strict_types=1);

namespace JWWS\WPPF\Test\PHPUnit\WordPress\Configuration;

/**
 * @link https://www.codetab.org/tutorial/wordpress-plugin-development/unit-test/plugin-unit-testing/
 */
final class Configuration {
    public static function of(string $file, array $options = []): self {
        self::validate(file: $file);

        return new self(
            file: $file,
            options: $options,
        );
    }

    /**
     * Assures the WordPress test library's bootstrap.php file exists.
     */
    private static function validate(string $file): string {
        if (file_exists(filename: $file)) {
            return $file;
        }

        echo PHP_EOL . 'Error: unable to find ' . $file . PHP_EOL;

        exit('' . PHP_EOL);
    }

    /**
     * @return void
     */
    private function __construct(
        private readonly string $file,
        private readonly array $options,
    ) {}

    public function init(): void {
        $this->require_file();
        $this->set_options();
        $this->create_default_wp_user();
        $this->print_wp_abspath();
    }

    /**
     * Calls WordPress test library's bootstrap.php file.
     */
    private function require_file(): void {
        require_once $this->file;
    }

    /**
     * Sets plugin and options for activation.
     */
    private function set_options(): void {
        $GLOBALS['wp_tests_options'] = $this->options;
    }

    /**
     * Creates a default user for the test.
     */
    private function create_default_wp_user(): void {
        (new \WP_User(id: 1))
            ->set_role(role: 'administrator')
        ;
    }

    /**
     * Displays the WordPress core absolute path to the user.
     */
    private function print_wp_abspath(): void {
        echo PHP_EOL;
        echo 'Using WordPress core: ' . ABSPATH . PHP_EOL;
        echo PHP_EOL;
    }
}
