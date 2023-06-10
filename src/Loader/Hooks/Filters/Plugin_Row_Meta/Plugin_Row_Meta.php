<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Hooks\Filters\Plugin_Row_Meta;

use JWWS\WPPF\{
    Collection\Standard_Collection\Standard_Collection,
    Common\Security\Security,
    Loader\Plugin\Plugin,
    Template\Template
};

// Security::stop_direct_access();

/**
 * Filter.
 */
final class Plugin_Row_Meta {
    /**
     * Factory method.
     */
    public static function of(Plugin $plugin): self {
        return new self(
            plugin: $plugin,
        );
    }

    /**
     * @return void
     */
    public function __construct(private Plugin $plugin) {
    }

    /**
     * Hooks into WordPress.
     */
    public function hook(): void {
        add_filter(
            'plugin_row_meta',
            [$this, 'callback'],
            10,
            2,
        );
    }

    /**
     * Filters the array of row meta for each plugin in the Plugins list table.
     *
     * @link https://developer.wordpress.org/reference/hooks/plugin_row_meta/
     *
     * @param array  $plugin_meta an array of the plugin's metadata, including
     *                            the version, author, author URI, and plugin
     *                            URI
     * @param string $plugin_file path to the plugin file relative to the
     *                            plugins directory
     *                            example "plugin-folder/plugin-name.php"
     */
    public function callback(array $plugin_meta, string $plugin_file): array {
        if (! $this->plugin->has_dependencies()) {
            return $plugin_meta;
        }

        if (! $this->plugin->basename_equals(basename: $plugin_file)) {
            return $plugin_meta;
        }

        return Standard_Collection::of(...$plugin_meta)
            ->add(items: $this->plugin->render_dependencies())
            ->to_array()
        ;
    }
}
