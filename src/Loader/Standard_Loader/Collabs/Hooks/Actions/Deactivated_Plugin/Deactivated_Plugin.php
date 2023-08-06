<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Deactivated_Plugin;

use JWWS\WPPF\Loader\Plugin\Plugin;
use function add_action;

// Security::stop_direct_access();

final class Deactivated_Plugin {
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
    private function __construct(private Plugin $plugin) {}

    /**
     * Hooks into WordPress.
     */
    public function hook(): void {
        add_action(
            'deactivated_plugin',
            [$this, 'callback'],
            10,
            1,
        );
    }

    /**
     * Fires after a plugin is deactivated.
     *
     * @link https://developer.wordpress.org/reference/hooks/deactivated_plugin/
     *
     * @param string $plugin path to the plugin file relative to the plugins
     *                       directory
     */
    public function callback(string $plugin): void {
        if (! $this->plugin->contains_dependency(basename: $plugin)) {
            return;
        }

        $this->plugin->deactivate();
    }
}
