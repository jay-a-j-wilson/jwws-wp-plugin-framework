<?php

namespace JWWS\WP_Plugin_Framework\Loader\PHP_Version_Checker;

use JWWS\WP_Plugin_Framework\Template_Engine\Template;
use JWWS\WP_Plugin_Framework\Loader\Plugin;
use JWWS\WP_Plugin_Framework\Loader\PHP_Version;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

class PHP_Version_Checker {
    /**
     * @param private Plugin $plugin
     * @param private PHP_Version $php_version
     */
    public function __construct(
        private Plugin $plugin,
        private PHP_Version $php_version,
    ) {
    }

    /**
     * @return self
     */
    public function is_at_least_min_version(): self {
        if (! is_admin()) {
            return $this;
        }

        if (! current_user_can(capability: 'activate_plugins')) {
            return $this;
        }

        $is_allowed_php_version = version_compare(
            version1: phpversion(),
            version2: $this->php_version->get_min(),
            operator: '>=',
        );

        // Check PHP version
        if ($is_allowed_php_version) {
            return $this;
        }

        add_action('admin_notices', [$this, 'print_min_version_notice']);

        deactivate_plugins(plugins: $this->plugin->get_filename());

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        return $this;
    }

    /**
     * Display the error HTML to the user.
     *
     * @return void
     */
    public function print_min_version_notice(): void {
        echo (new Template(filename: __DIR__ . '/templates/min_version_notice'))
            ->assign(names: 'current_php_version', value: phpversion())
            ->assign(names: 'min_php_version', value: $this->php_version->get_min())
            ->output()
        ;
    }

    /**
     * @return self
     */
    public function is_at_most_max_version(): self {
        if (! is_admin()) {
            return $this;
        }

        if (! current_user_can(capability: 'activate_plugins')) {
            return $this;
        }

        $is_allowed_php_version = version_compare(
            version1: phpversion(),
            version2: $this->php_version->get_max(),
            operator: '<=',
        );

        // Check PHP version
        if ($is_allowed_php_version) {
            return $this;
        }

        add_action('admin_notices', [$this, 'print_max_version_notice']);

        deactivate_plugins(plugins: $this->plugin->get_filename());

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        return $this;
    }

    /**
     * Display the error HTML to the user.
     *
     * @return void
     */
    public function print_max_version_notice(): void {
        echo (new Template(filename: __DIR__ . '/templates/max_version_notice'))
            ->assign(names: 'current_php_version', value: phpversion())
            ->assign(names: 'max_php_version', value: $this->php_version->get_max())
            ->output()
        ;
    }
}
