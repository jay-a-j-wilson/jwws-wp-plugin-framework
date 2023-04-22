<?php

namespace JWWS\WPPF\Loader\Plugin;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security,
    Loader\Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta,
    Loader\Plugin\Value_Objects\Basename\Basename,
    Loader\Plugin\Value_Objects\Name\Name,
    Traits\Log\Log
};

Security::stop_direct_access();

/**
 */
final class Plugin {
    use Log;

    /**
     * Creates object using the plugin's slug.
     *
     * Use when the plugin's directory name is the same as the plugin's main
     * filename.
     *
     * @param string $slug
     * @param string $fallback_name will be overwitten by plugin's name if it's
     *                              installed
     *
     * @return self
     */
    public static function of_slug(
        string $slug,
        string $fallback_name,
    ): self {
        return self::of_basename(
            basename: "{$slug}/{$slug}.php",
            fallback_name: $fallback_name,
        );
    }

    /**
     * Creates object using the plugin's basename.
     *
     * Use when the plugin's directory name is different from the plugin's main
     * filename.
     *
     * @param string $basename      example "directory/filename.php"
     * @param string $fallback_name will be overwitten by plugin's name if it's
     *                              installed
     *
     * @return self
     */
    public static function of_basename(
        string $basename,
        string $fallback_name,
    ): self {
        return new self(
            basename: Basename::of(basename: $basename),
            name: Name::of(
                basename: $basename,
                fallback_name: $fallback_name,
            ),
        );
    }

    /**
     * @param Basename   $basename
     * @param Name       $name
     * @param Collection $dependencies
     */
    private function __construct(
        private Basename $basename,
        private Name $name,
        private Collection $dependencies = new Collection,
    ) {
    }

    /**
     * Deactivates plugin.
     *
     * @return bool
     */
    public function deactivate(): void {
        deactivate_plugins(plugins: $this->basename->value());
    }

    /**
     * Checks if active.
     *
     * @return bool
     */
    public function is_active(): bool {
        return is_plugin_active(plugin: $this->basename->value());
    }

    /**
     * Checks if plugin meets activation criteria.
     *
     * @return bool
     */
    public function can_activate(): bool {
        return ! is_admin()
        || ! current_user_can(capability: 'activate_plugins')
        || ! $this->has_inactive_dependencies();
    }

    /**
     * Adds a plugin dependency.
     *
     * @param self $plugins
     *
     * @return self for chaining
     */
    public function add_dependencies(self ...$plugins): self {
        $this->dependencies->add(...$plugins);

        return $this->append_dependencies_to_listing();
    }

    /**
     * Returns the plugin's name.
     *
     * @return string
     */
    public function name(): string {
        return $this->name->value();
    }

    /**
     * Returns the plugin's filename.
     *
     * Example: "plugin-folder/plugin-filename.php"
     *
     * @return string
     */
    public function basename(): string {
        return $this->basename->value();
    }

    /**
     * Returns the plugin's dependent plugins.
     *
     * @return Collection
     */
    public function dependencies(): Collection {
        return $this->dependencies;
    }

    /**
     * Returns the plugin's inactive dependent plugins.
     *
     * @return Collection
     */
    public function inactive_dependencies(): Collection {
        return $this->dependencies
            ->filter_by_value(
                callback: fn (Plugin $dependant): bool => ! $dependant->is_active(),
            )
        ;
    }

    /**
     * Returns the plugin's dependent plugins.
     *
     * @return Collection
     */
    public function dependencies_names(): Collection {
        return $this->dependencies
            ->map(
                callback: fn (Plugin $dependency): string => $dependency->name(),
            )
        ;
    }

    /**
     * Checks if plugins has dependent plugins.
     *
     * @return bool
     */
    public function has_dependencies(): bool {
        return $this->dependencies->count() > 0;
    }

    /**
     * Checks if plugins has inactive dependent plugins.
     *
     * @return bool
     */
    public function has_inactive_dependencies(): bool {
        return $this->inactive_dependencies()->count() > 0;
    }

    /**
     * Checks if plugin has dependency of plugin.
     *
     * @param string $basename Example 'directory/filename.php'.
     *
     * @return bool
     */
    public function contains_dependecy(string $basename): bool {
        return $this->dependencies
            ->contains_value(value: $basename)
        ;
    }

    /**
     * @docs https://developer.wordpress.org/reference/hooks/plugin_row_meta/
     *
     * @return self for chaining
     */
    public function append_dependencies_to_listing(): self {
        Plugin_Row_Meta::hook(plugin: $this);

        return $this;
    }
}