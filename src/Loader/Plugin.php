<?php

namespace JWWS\WP_Plugin_Framework\Loader;

class Plugin {
    /**
     * Creates object using the plugin's slug.
     *
     * Use when the plugin's directory name is the same as the plugin's main
     * file name.
     *
     * @param string $name
     * @param string $slug
     *
     * @return Plugin
     */
    public static function create_with_slug(string $name, string $slug): self {
        return new self(
            name: $name,
            filename: "{$slug}/{$slug}.php",
        );
    }

    /**
     * Creates object using the plugin's path.
     *
     * Use when the plugin's directory name is different from the plugin's main
     * file name.
     *
     * @param string $name
     * @param string $path Example "directory/filename.php"
     *
     * @return Plugin
     */
    public static function create_with_path(string $name, string $path): self {
        return new self(
            name: $name,
            filename: $path,
        );
    }

    /**
     * @param private string $name
     * @param private string $filename
     */
    private function __construct(
        private string $name,
        private string $filename,
    ) {
    }

    /**
     * @return string
     */
    public function get_name(): string {
        return $this->name;
    }

    /**
     * Returns the plugin's filename.
     *
     * Example
     * directory/filename.php
     *
     * @return string
     */
    public function get_filename(): string {
        return $this->filename;
    }
}
