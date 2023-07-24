<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin;

// @codeCoverageIgnoreStart
use JWWS\WPPF\Collection\Collection;
use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Basename;
use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Name;
/** @codeCoverageIgnoreEnd */

interface Plugin {
    /**
     * Creates object using the plugin's slug.
     *
     * Use when the plugin's directory name is the same as the plugin's main
     * filename.
     *
     * @param string $fallback_name will be overwritten by plugin's name if it's
     *                              installed
     */
    public static function of_slug(string $slug, string $fallback_name): static;

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
    ): static;

    /**
     * Returns basename.
     */
    public function basename(): Basename;

    /**
     * Returns name.
     */
    public function name(): Name;

    /**
     * Returns dependencies.
     */
    public function dependencies(): Collection;

    /**
     * Activates plugin.
     */
    public function activate(): static;

    /**
     * Deactivates plugin.
     */
    public function deactivate(): static;

    /**
     * Checks if plugin is active.
     */
    public function is_active(): bool;

    /**
     * Checks if plugin is inactive.
     */
    public function is_inactive(): bool;

    /**
     * Checks if plugin meets activation criteria.
     */
    public function can_activate(): bool;

    /**
     * @param string $basename Example 'directory/filename.php'.
     */
    public function basename_equals(string $basename): bool;

    /**
     * Adds a plugin dependency.
     */
    public function add_dependencies(self ...$plugins): static;

    /**
     * Returns the plugin's dependent plugins.
     */
    public function dependencies_names(): Collection;

    /**
     * Checks if plugin has dependency of plugin.
     *
     * @param string $basename Example 'directory/filename.php'.
     */
    public function contains_dependency(string $basename): bool;

    /**
     * Returns the plugin's active dependent plugins.
     */
    public function active_dependencies(): Collection;

    /**
     * Returns the plugin's inactive dependent plugins.
     */
    public function inactive_dependencies(): Collection;

    /**
     * Checks if plugins has dependent plugins.
     */
    public function has_dependencies(): bool;

    /**
     * Checks if plugins has active dependent plugins.
     */
    public function has_active_dependencies(): bool;

    /**
     * Checks if plugins has inactive dependent plugins.
     */
    public function has_inactive_dependencies(): bool;

    /**
     * Checks if plugins has no active dependent plugins.
     */
    public function has_no_active_dependencies(): bool;

    /**
     * Checks if plugins has no inactive dependent plugins.
     */
    public function has_no_inactive_dependencies(): bool;

    /**
     * @docs https://developer.wordpress.org/reference/hooks/plugin_row_meta/
     */
    public function append_dependencies_to_listing(): static;

    /**
     * Outputs the plugin's required dependency's names as HTML.
     */
    public function render_dependencies(): string;
}
