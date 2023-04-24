<?php

namespace JWWS\WPPF\Loader\Hooks\Filters\Plugin_Row_Meta;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader\Plugin\Plugin,
    Template\Template,
    Collection\Collection
};

// Security::stop_direct_access();

/**
 * Filter.
 */
final class Plugin_Row_Meta {
    /**
     * Undocumented function.
     */
    public static function hook(Plugin $plugin): void {
        add_filter(
            'plugin_row_meta',
            [new self(plugin: $plugin), 'callback'],
            10,
            2,
        );
    }

    /**
     * Undocumented function.
     */
    private function __construct(private Plugin $plugin) {
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

        return Collection::of($plugin_meta)
            ->add($this->list_dependencies())
            ->to_array()
        ;
    }

    /**
     * List the plugin's dependency's names.
     */
    private function list_dependencies(): string {
        return Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(
                names: 'plugin_names',
                value: $this->plugin
                    ->dependencies_names()
                    ->implode(),
            )
            ->output()
        ;
    }
}
