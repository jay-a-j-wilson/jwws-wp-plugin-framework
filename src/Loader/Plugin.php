<?php

namespace JWWS\WPPF\Loader;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Plugin {
    /**
     * Creates object using the plugin's slug.
     *
     * Use when the plugin's directory name is the same as the plugin's main
     * file name.
     *
     * @param string $slug
     *
     * @return Plugin
     */
    public static function create_with_slug(string $slug): self {
        return new self(
            filename: "{$slug}/{$slug}.php",
            dependencies: Plugin_Collection::create(),
        );
    }

    /**
     * Creates object using the plugin's path.
     *
     * Use when the plugin's directory name is different from the plugin's main
     * file name.
     *
     * @param string $path Example "directory/filename.php"
     *
     * @return Plugin
     */
    public static function create_with_path(string $path): self {
        return new self(
            filename: $path,
            dependencies: Plugin_Collection::create(),
        );
    }

    /**
     * @param string            $filename
     * @param Plugin_Collection $dependencies
     */
    private function __construct(
        private string $filename,
        private Plugin_Collection $dependencies,
    ) {
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
     * Adds a plugin dependency.
     *
     * @param Plugin $plugins
     *
     * @return self for chaining
     */
    public function add_dependencies(self ...$plugins): self {
        foreach ($plugins as $plugin) {
            $this->dependencies->add($plugin);
        }

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
        return $this->dependencies->get_all_inactive();
    }

    /**
     * Checks if plugins has inactive dependent plugins.
     *
     * @return bool
     */
    public function has_inactive_dependencies(): bool {
        return $this->dependencies->has_inactive();
    }

    /**
     * Returns the plugin's name as set in its metadata.
     *
     * @source https://developer.wordpress.org/reference/functions/get_plugin_data/
     *
     * @return string
     */
    public function get_name(): string {
        if (! is_admin()) {
            return '';
        }

        // get_plugin_data() is NOT available by default (not even in admin).
        if (! function_exists(function: 'get_plugin_data')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        return get_plugin_data(
            plugin_file: trailingslashit(string: WP_PLUGIN_DIR) . $this->filename,
        )['Name'];
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
