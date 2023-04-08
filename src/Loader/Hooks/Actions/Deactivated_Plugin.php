<?php

namespace JWWS\WPPF\Loader\Hooks\Actions;

use JWWS\WPPF\{
    Security\Security,
    Loader\Plugin\Plugin\Plugin
};

Security::stop_direct_access();

/**
 */
final class Deactivated_Plugin {
    /**
     * @param Plugin $plugin
     *
     * @return self
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
     * @param Plugin $plugin
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
     *
     * @return void
     */
    public function callback(string $plugin): void {
        if ($this->plugin->includes_dependecy(plugin: $plugin)) {
            $this->plugin->deactivate();
        }
    }
}
