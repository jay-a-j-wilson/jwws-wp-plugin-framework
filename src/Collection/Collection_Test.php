<?php

namespace JWWS\WPPF\Collection;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Abstract_Test,
    Logger\Error_Logger\Error_Logger,
    WooCommerce\WooCommerce,
    WordPress\Terms\Product\Categories\Categories as Product_Categories
};

Security::stop_direct_access();

/**
 */
final class Collection_Test extends Abstract_Test {
    /**
     * @return void
     */
    public static function run(): void {
        add_action(
            'wp_loaded',
            [__CLASS__, 'hook'],
        );
    }

    /**
     * @return Collection
     */
    private static function get_collection(): Collection {
        return Collection::create_from(items: [
            'title'                 => 'Mouse',
            'nav_title'             => '',
            'notes'                 => '',
            'thumbnail'             => 15549,
            'description'           => '<p>[sc name="builder_mouse"][/sc]</p>',
            'bottom_description'    => '',
            'description_auto_tags' => 1,
            'categories'            => [
                0 => 36473,
                1 => 36481,
            ],
            'attributes' => [
                0 => 'pa_in-alpha#36496',
                1 => 'pa_in-horizon#36494',
            ],
        ]);
    }

    /**
     * @return void
     */
    public static function hook(): void {
        self::map_product_category();
        // self::offset();
        // self::filter_by_key();
        // self::map();
        // self::contains_key_true();
        // self::contains_key_false();
    }

    /**
     * @return void
     */
    private static function map_product_category(): void {
        Collection::create_from(items: [
            0 => 36473,
            1 => 36481,
        ])
            ->log()
            ->map(
                callback: fn (int $item): string => Product_Categories::create()
                    ->find_by_id(id: $item)->name . " [#{$item}]",
            )
            ->log()
        ;
    }

    /**
     * @return void
     */
    private static function contains_key_true(): void {
        self::get_collection()->contains_key(key: 'notes')
            ? self::log_passed()
            : self::log_failed();
    }

    /**
     * @return void
     */
    private static function contains_key_false(): void {
        self::get_collection()->contains_key(key: 'invalid_prop')
            ? self::log_failed()
            : self::log_passed();
    }

    /**
     * @return void
     */
    private static function offset(): void {
        self::get_collection()['thumbnail'] === 15549
            ? self::log_passed()
            : self::log_failed();
    }

    /**
     * @return void
     */
    private static function filter_by_key(): void {
        Error_Logger::log(
            output: self::get_collection()
                ->filter_by_key(callback: fn ($setting) => $setting !== ''),
        );
    }

    /**
     * @return void
     */
    private static function map(): void {
        Error_Logger::log(
            output: self::get_collection()
                ->map(callback: fn ($setting) => $setting . '--SUFFIX'),
        );
    }
}
