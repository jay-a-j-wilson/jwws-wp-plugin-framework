<?php

namespace JWWS\WPPF\Loader\Plugin\Plugin_File;

use JWWS\WPPF\{
    Security\Security,
    Traits\Log\Log
};

Security::stop_direct_access();

/**
 */
final class Plugin_File {
    use Log;

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
     * @var string
     */
    private string $path;

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
