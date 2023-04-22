<?php

namespace JWWS\WPPF\Loader\Hooks\Filters\Plugin_Row_Meta;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader\Plugin\Plugin,
    Template\Template
};

Security::stop_direct_access();

/**
 * Filter.
 */
final class Plugin_Row_Meta {
    /**
     * @param Plugin $plugin
     *
     * @return self
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
     * @param Plugin $plugin
     */
    private function __construct(private Plugin $plugin) {
    }

    /**
     * Filters the array of row meta for each plugin in the Plugins list table.
     *
     * @docs https://developer.wordpress.org/reference/hooks/plugin_row_meta/
     *
     * @param array  $plugin_meta an array of the plugin's metadata, including
     *                            the version, author, author URI, and plugin
     *                            URI
     * @param string $plugin_file path to the plugin file relative to the
     *                            plugins directory
     *                            exmaple "plugin-folder/plugin-name.php"
     *
     * @return void
     */
    public function callback(array $plugin_meta, string $plugin_file): array {
        if (! $this->plugin->has_dependencies()) {
            return $plugin_meta;
        }

        if ($plugin_file !== $this->plugin->basename()) {
            return $plugin_meta;
        }

        // you can still use array_unshift() to add links at the beginning
        $plugin_meta[] = Template::of(path: __DIR__ . '/templates/template.html.php')
            ->assign(
                names: 'plugin_names',
                value: $this->plugin
                    ->dependencies_names()
                    ->to_string(),
            )
            ->output()
        ;

        return $plugin_meta;
    }
}
