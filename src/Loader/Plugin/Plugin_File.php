<?php

namespace JWWS\WPPF\Loader\Plugin;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Plugin File.
 */
class Plugin_File {
    /**
     * @param string $name
     *
     * @return self
     */
    public static function create(string $name): self {
        return new self(
            name: $name,
        );
    }

    /**
     * @param string $name
     */
    private function __construct(private string $name) {
        $this->path = trailingslashit(string: WP_PLUGIN_DIR) . $this->name;
    }

    /**
     * Checks if file exists.
     *
     * @return bool
     */
    public function exists(): bool {
        return file_exists(filename: $this->path);
    }

    /**
     * Returns name.
     * Example: directoy/plugin.php.
     *
     * @return string
     */
    public function get_name(): string {
        return $this->name;
    }

    /**
     * Returns full path.
     *
     * @return string
     */
    public function get_path(): string {
        return $this->path;
    }
}
