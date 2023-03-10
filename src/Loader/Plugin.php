<?php

namespace JWWS\WPPF\Loader;

use JWWS\WPPF\Logger;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Plugin.
 */
class Plugin {
    /**
     * Creates object using the plugin's slug.
     *
     * Use when the plugin's directory name is the same as the plugin's main
     * file name.
     *
     * @param string $slug
     * @param string $fallback_name will be overwitten by plugins name if installed
     *
     * @return Plugin
     */
    public static function create_with_slug(
        string $slug,
        string $fallback_name = '',
    ): self {
        return new self(
            filename: "{$slug}/{$slug}.php",
            fallback_name: $fallback_name,
        );
    }

    /**
     * Creates object using the plugin's path.
     *
     * Use when the plugin's directory name is different from the plugin's main
     * file name.
     *
     * @param string $path          example "directory/filename.php"
     * @param string $fallback_name will be overwitten by plugins name if installed
     *
     * @return Plugin
     */
    public static function create_with_path(
        string $path,
        string $fallback_name = '',
    ): self {
        return new self(
            filename: $path,
            fallback_name: $fallback_name,
        );
    }

    /**
     * @var Plugin_Collection
     */
    private Plugin_Collection $dependencies;

    /**
     * @var string
     */
    private string $path = '';

    /**
     * @var string
     */
    private string $name = '';

    /**
     * @var bool
     */
    private bool $is_installed = false;

    /**
     * @param string $filename
     * @param string $fallback_name
     */
    private function __construct(
        private string $filename,
        private string $fallback_name,
    ) {
        $this->dependencies = Plugin_Collection::create();
        $this->path         = trailingslashit(string: WP_PLUGIN_DIR) . $this->filename;
        $this->is_installed = file_exists(filename: $this->path);

        $this->name = $this->is_installed
            ? $this->fetch_name()
            : $this->fallback_name;
    }

    /**
     * Returns the plugin's name as set in its metadata.
     *
     * @source https://developer.wordpress.org/reference/functions/get_plugin_data/
     *
     * @param mixed $name
     *
     * @return string
     */
    private function fetch_name(): string {
        if (! is_admin()) {
            return '';
        }

        // get_plugin_data() is NOT available by default (not even in admin).
        if (! function_exists(function: 'get_plugin_data')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        return get_plugin_data(plugin_file: $this->path)['Name'];
    }

    /**
     * Logs object.
     *
     * @return self for chaining
     */
    public function log(): self {
        Logger::error_log(output: $this, depth: 2);

        return $this;
    }

    /**
     * Returns the plugin's name.
     *
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

    /**
     * Checks if active.
     *
     * @return bool
     */
    public function is_active(): bool {
        return is_plugin_active(plugin: $this->filename);
    }

    /**
     * Deactivates plugin.
     *
     * @return bool
     */
    public function deactivate(): void {
        deactivate_plugins(plugins: $this->filename);
    }

    /**
     * Checks if plugin has a fallback name.
     *
     * @return string
     */
    public function has_fallback_name(): bool {
        return ! empty($this->fallback_name);
    }

    /**
     * Adds a plugin dependency.
     *
     * @param Plugin $plugins
     *
     * @return self for chaining
     */
    public function add_dependencies(self ...$plugins): self {
        foreach ($plugins as $plugin) {
            if (! $plugin->has_fallback_name()) {
                throw new \Exception(message: 'A plugin must have a fallback name before it can be added as a dependency.');
            }
        }

        $this->dependencies->add(...$plugins);

        return $this;
    }

    /**
     * Checks if plugin has dependency of plugin.
     *
     * @param string $plugin Path to plugin file relative to plugin's directory.
     *                       Example 'directory/filename.php'.
     *
     * @return bool
     */
    public function includes_dependecy(string $plugin): bool {
        return $this->dependencies->includes(plugin: $plugin);
    }

    /**
     * Returns the plugin's dependent plugins.
     *
     * @return Plugin_Collection
     */
    public function get_dependencies(): Plugin_Collection {
        return $this->dependencies;
    }

    /**
     * Returns the plugin's inactive dependent plugins.
     *
     * @return Plugin_Collection
     */
    public function get_inactive_dependencies(): Plugin_Collection {
        return $this->dependencies->get_inactive();
    }

    /**
     * Checks if plugins has inactive dependent plugins.
     *
     * @return bool
     */
    public function has_inactive_dependencies(): bool {
        return $this->dependencies->has_inactive();
    }
}
