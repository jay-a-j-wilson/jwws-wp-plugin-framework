<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin;

use JWWS\WPPF\{
    Collection\Collection,
    Common\Security\Security,
    Loader\Hooks\Filters\Plugin_Row_Meta\Plugin_Row_Meta,
    Loader\Plugin\Sub_Value_Objects\Basename\Basename,
    Loader\Plugin\Sub_Value_Objects\Name\Name,
    Template\Template
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Plugin {
    /**
     * Creates object using the plugin's slug.
     *
     * Use when the plugin's directory name is the same as the plugin's main
     * filename.
     *
     * @param string $fallback_name will be overwritten by plugin's name if it's
     *                              installed
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
     * @param string $fallback_name will be overwritten by plugin's name if it's
     *                              installed
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

    public readonly Collection $dependencies;

    /**
     * Undocumented function.
     */
    private function __construct(
        public readonly Basename $basename,
        public readonly Name $name,
    ) {
        $this->dependencies = Collection::create();
    }

    /**
     * Activates plugin.
     */
    public function activate(): self {
        activate_plugin(plugin: $this->basename->__toString());

        return $this;
    }

    /**
     * Deactivates plugin.
     */
    public function deactivate(): self {
        deactivate_plugins(plugins: $this->basename->__toString());

        return $this;
    }

    /**
     * Checks if plugin is active.
     */
    public function is_active(): bool {
        return is_plugin_active(plugin: $this->basename->__toString());
    }

    /**
     * Checks if plugin is inactive.
     */
    public function is_inactive(): bool {
        return ! $this->is_active();
    }

    /**
     * Checks if plugin meets activation criteria.
     */
    public function can_activate(): bool {
        return $this->has_no_inactive_dependencies();
        // return current_user_can(capability: 'activate_plugins')
        // && $this->has_no_inactive_dependencies();
    }

    /**
     * @param string $basename Example 'directory/filename.php'.
     */
    public function basename_equals(string $basename): bool {
        return $this->basename->__toString() === $basename;
    }

    /**
     * Adds a plugin dependency.
     */
    public function add_dependencies(self ...$plugins): self {
        $this->dependencies->add(...$plugins);

        return $this->append_dependencies_to_listing();
    }

    /**
     * Returns the plugin's dependent plugins.
     */
    public function dependencies_names(): Collection {
        return $this->dependencies
            ->pluck(key: 'name')
            ->map(callback: fn (Name $name): string => $name->__toString())
        ;
    }

    /**
     * Checks if plugin has dependency of plugin.
     *
     * @param string $basename Example 'directory/filename.php'.
     */
    public function contains_dependency(string $basename): bool {
        return $this->dependencies
            ->pluck(key: 'basename')
            ->contains_value(value: $basename)
        ;
    }

    /**
     * Returns the plugin's active dependent plugins.
     */
    public function active_dependencies(): Collection {
        return $this->dependencies
            ->filter_by_value(
                callback: fn (Plugin $dependant): bool => $dependant->is_active(),
            )
        ;
    }

    /**
     * Returns the plugin's inactive dependent plugins.
     */
    public function inactive_dependencies(): Collection {
        return $this->dependencies
            ->filter_by_value(
                callback: fn (Plugin $dependant): bool => ! $dependant->is_active(),
            )
        ;
    }

    /**
     * Checks if plugins has dependent plugins.
     */
    public function has_dependencies(): bool {
        return $this->dependencies->count() > 0;
    }

    /**
     * Checks if plugins has active dependent plugins.
     */
    public function has_active_dependencies(): bool {
        return $this->active_dependencies()->count() > 0;
    }

    /**
     * Checks if plugins has inactive dependent plugins.
     */
    public function has_inactive_dependencies(): bool {
        return $this->inactive_dependencies()->count() > 0;
    }

    /**
     * Checks if plugins has no active dependent plugins.
     */
    public function has_no_active_dependencies(): bool {
        return $this->active_dependencies()->count() === 0;
    }

    /**
     * Checks if plugins has no inactive dependent plugins.
     */
    public function has_no_inactive_dependencies(): bool {
        return $this->inactive_dependencies()->count() === 0;
    }

    /**
     * @docs https://developer.wordpress.org/reference/hooks/plugin_row_meta/
     */
    public function append_dependencies_to_listing(): self {
        Plugin_Row_Meta::of(plugin: $this)->hook();

        return $this;
    }

    /**
     * Outputs the plugin's required dependency's names as HTML.
     */
    public function render_dependencies(): string {
        return Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(
                key: 'plugin_names',
                value: $this
                    ->dependencies_names()
                    ->implode(),
            )
            ->output()
        ;
    }
}
