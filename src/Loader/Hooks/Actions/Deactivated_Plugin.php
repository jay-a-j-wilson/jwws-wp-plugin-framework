<?php

namespace JWWS\WPPF\Loader\Hooks\Actions;

use JWWS\WPPF\{
    Common\Security\Security,
    Loader\Plugin\Plugin};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Deactivated_Plugin {
    /**
     * Undocumented function.
     */
    public static function hook(Plugin $plugin): void {
        add_filter(
            'deactivated_plugin',
            [new self(plugin: $plugin), 'callback'],
            10,
            1,
        );
    }

    /**
     * Undocumented function.
     */
    private function __construct(private Plugin $plugin) {
    }

    /**
     * Fires after a plugin is deactivated.
     *
     * @docs https://developer.wordpress.org/reference/hooks/deactivated_plugin/
     *
     * @param string $plugin path to the plugin file relative to the plugins
     *                       directory
     */
    public function callback(string $plugin): void {
        if ($this->plugin->contains_dependency(basename: $plugin)) {
            $this->plugin->deactivate();
        }
    }
}
