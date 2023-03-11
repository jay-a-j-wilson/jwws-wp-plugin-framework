<?php

namespace JWWS\WPPF\Loader\Hooks\Filters\Plugin_Row_Meta;

use JWWS\WPPF\{
    Template\Template,
    Loader\Plugin\Plugin
};

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Filter.
 */
class Plugin_Row_Meta {
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
     * Filters the array of row meta for each plugin in the Plugins list table
     * 
     * @docs https://developer.wordpress.org/reference/hooks/plugin_row_meta/
     * 
     * @param array  $plugin_meta
     * @param string $plugin_file
     *
     * @return void
     */
    public function callback(array $plugin_meta, string $plugin_file): array {
        if (! $this->plugin->has_dependencies()) {
            return $plugin_meta;
        }

        if ($plugin_file !== $this->plugin->get_filename()) {
            return $plugin_meta;
        }

        // you can still use array_unshift() to add links at the beginning
        $plugin_meta[] = Template::create(filename: __DIR__ . '/templates/template')
            ->assign(
                names: 'plugin_names',
                value: implode(
                    separator: ', ',
                    array: $this->plugin->get_dependencies_names(),
                ),
            )
            ->output()
        ;

        return $plugin_meta;
    }
}