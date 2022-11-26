<?php

namespace JWWS\WP_Plugin_Framework\Dependency_Manager;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Composer {
    /**
     * @param string $filename
     *
     * @return Composer
     */
    public static function create_from_filename(string $filename) {
        return new self(
            filename: $filename
        );
    }

    /**
     * @param string $filename
     */
    public function __construct(private string $filename) {
    }

    /**
     * @throws Exception
     *
     * @return string
     */
    public function get_autoload_file(): string {
        if (file_exists(filename: $this->filename)) {
            return $this->filename;
        }

        throw new \Exception(
            message: "Autoload file “{$this->filename}” not found. Check Composer has been installed.",
        );
    }
}