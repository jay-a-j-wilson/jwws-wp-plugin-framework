<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Init;

use JWWS\WPPF\Loader\Plugin\Plugin;
use JWWS\WPPF\Loader\Standard_Loader\Collabs\Hooks\Actions\Admin_Notices\Admin_Notices;
use function add_action;

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Admin_Init {
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
    public function __construct(private Plugin $plugin) {}

    /**
     * Hooks into WordPress.
     */
    public function hook(): void {
        add_action(
            'admin_init',
            [$this, 'callback'],
            10,
            2,
        );
    }

    /**
     * Fires as an admin screen or script is being initialized.
     *
     * @docs https://developer.wordpress.org/reference/hooks/admin_init/
     */
    public function callback(): void {
        if ($this->plugin->can_activate()) {
            return;
        }

        $this->plugin
            ->inactive_dependencies()
            ->each(
                callback: fn (Plugin $inactive_dependency) => Admin_Notices::of(
                    plugin: $this->plugin,
                    dependency: $inactive_dependency,
                )
                    ->hook(),
            )
        ;

        $this->plugin->deactivate();

        unset($_GET['activate']);
    }
}
