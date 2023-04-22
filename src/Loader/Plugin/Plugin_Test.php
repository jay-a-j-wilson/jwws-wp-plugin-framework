<?php

namespace JWWS\WPPF\Loader\Plugin;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Logger\Error_Logger\Error_Logger};

Security::stop_direct_access();

/**
 */
final class Plugin_Test extends Test {
    /**
     * @return void
     */
    public static function run(): void {
        self::create();
        self::get_name();
        self::is_active();
        self::add_dependencies();
        self::has_dependencies();
        self::get_dependencies_names();
        self::append_dependencies_to_listing();
        self::contains_dependecy();
    }

    /**
     */
    private static function create(): void {
        Plugin::of_slug(
            slug: 'block-bad-queries',
            fallback_name: 'my name',
        )->log();

        Plugin::of_slug(
            slug: 'a-plugin',
            fallback_name: 'Dep Plugin',
        )->log();
    }

    /**
     */
    private static function get_name(): void {
        Error_Logger::log(
            Plugin::of_slug(
                slug: 'block-bad-queries',
                fallback_name: 'Name',
            )
                ->name(),
        );

        Error_Logger::log(
            Plugin::of_slug(
                slug: 'a-plugin',
                fallback_name: 'Plugin',
            )
                ->name(),
        );
    }

    /**
     */
    private static function is_active(): void {
        Error_Logger::log(
            output: Plugin::of_slug(
                slug: 'block-bad-queries',
                fallback_name: 'Name',
            )
                ->is_active(),
        );

        Error_Logger::log(
            output: Plugin::of_slug(
                slug: 'wp-sweep',
                fallback_name: 'Name',
            )
                ->is_active(),
        );

        Error_Logger::log(
            output: Plugin::of_slug(
                slug: 'a-plugin',
                fallback_name: 'Plugin',
            )
                ->is_active(),
        );
    }

    /**
     */
    private static function add_dependencies(): void {
        Plugin::of_slug(
            slug: 'block-bad-queries',
            fallback_name: 'Name',
        )
            ->log()
            ->add_dependencies(
                plugins: Plugin::of_slug(
                    slug: 'wp-sweep',
                    fallback_name: 'wp sweep',
                ),
            )
            ->log()
            ->add_dependencies(
                Plugin::of_slug(slug: 'elementor', fallback_name: 'elementor'),
                Plugin::of_slug(slug: 'a-plugin', fallback_name: 'A Plugin'),
            )
            ->log()
        ;
    }

    /**
     */
    private static function get_dependencies_names(): void {
        Error_Logger::log(
            output: Plugin::of_slug(
                slug: 'jwws-wp-open-row-actions',
                fallback_name: 'Name',
            )
                ->add_dependencies(
                    Plugin::of_slug(
                        slug: 'airplane-mode',
                        fallback_name: 'Airplane Mode',
                    ),
                    Plugin::of_slug(
                        slug: 'block-bad-queries',
                        fallback_name: 'BBQ Firewall',
                    ),
                )
                ->log()
                ->dependencies_names(),
        );
    }

    /**
     */
    private static function has_dependencies(): void {
        Error_Logger::log(
            output: Plugin::of_slug(
                slug: 'jwws-wp-open-row-actions',
                fallback_name: 'Name',
            )
                ->has_dependencies(),
        );

        Error_Logger::log(
            output: Plugin::of_slug(
                slug: 'jwws-wp-open-row-actions',
                fallback_name: 'Name',
            )
                ->add_dependencies(
                    Plugin::of_slug(
                        slug: 'airplane-mode',
                        fallback_name: 'Airplane Mode',
                    ),
                    Plugin::of_slug(
                        slug: 'block-bad-queries',
                        fallback_name: 'BBQ Firewall',
                    ),
                )
                ->has_dependencies(),
        );
    }

    /**
     */
    private static function append_dependencies_to_listing(): void {
        Plugin::of_slug(
            slug: 'jwws-wp-open-row-actions',
            fallback_name: 'Name',
        )
            ->add_dependencies(
                Plugin::of_slug(
                    slug: 'airplane-mode',
                    fallback_name: 'Airplane Mode',
                ),
                // Plugin::of_slug(slug: 'block-bad-queries', fallback_name: 'BBQ Firewall'),
            )
        ;
    }

    /**
     */
    private static function contains_dependecy(): void {
        $plugin = Plugin::of_slug(
            slug: 'block-bad-queries',
            fallback_name: 'Name',
        )
            ->add_dependencies(
                Plugin::of_slug(slug: 'elementor', fallback_name: 'Name'),
                Plugin::of_slug(slug: 'shortcoder', fallback_name: 'Name'),
            )
        ;

        Error_Logger::log(
            output: $plugin->contains_dependecy(basename: 'elementor/elementor.php'),
        );

        Error_Logger::log(
            output: $plugin->contains_dependecy(basename: 'wp-sweep/wp-sweep.php'),
        );
    }
}