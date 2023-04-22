<?php

namespace JWWS\WPPF\Collection;

use JWWS\WPPF\{
    Common\Security\Security,
    Common\Testing\Test,
    Logger\Error_Logger\Error_Logger,
    Common\Testing\Test_Data\Test_Object_1,
    Common\Testing\Test_Data\Test_Object_2,
    Common\Testing\Test_Data\Test_User
};

Security::stop_direct_access();

/**
 */
final class Collection_Test extends Test {
    /**
     * @return Collection
     */
    private static function get_collection(): Collection {
        return Collection::of(items: [
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
    public static function run(): void {
        self::slice_positive();
        self::slice_negative();

        // self::of_single();
        // self::of_multiple();
        // self::of_array();
        // self::of_multiple_object();

        // self::add_single();
        // self::add_multiple();
        // self::pluck_array();
        // self::pluck_object();

        // self::map_product_category();
        // self::offset();
        // self::filter_by_key();
        // self::map();
        // self::contains_key_true();
        // self::contains_key_false();
    }

    /**
     * @return void
     */
    public static function slice_positive(): void {
        Error_Logger::log(
            output: Collection::of(
                'a',
                'b',
                'c',
                'd',
                'e',
                'f',
            )
                ->slice(offset: 2),
        );
    }

    /**
     * @return void
     */
    public static function slice_negative(): void {
        Error_Logger::log(
            output: Collection::of(
                'a',
                'b',
                'c',
                'd',
                'e',
                'f',
            )
                ->slice(offset: -2),
        );
    }

    /**
     * @return void
     */
    public static function of_single(): void {
        Error_Logger::log(
            output: Collection::of(items: 'a'),
        );
    }

    /**
     * @return void
     */
    public static function of_multiple(): void {
        Error_Logger::log(
            output: Collection::of('a', 'b'),
        );
    }

    /**
     * @return void
     */
    public static function of_array(): void {
        Error_Logger::log(
            output: Collection::of(['a', 'b']),
        );
    }

    /**
     * @return void
     */
    public static function of_multiple_object(): void {
        Error_Logger::log(
            output: Collection::of(
                Test_User::of(
                    id: 2135,
                    first_name: 'John',
                    last_name: 'Doe',
                ),
                Test_User::of(
                    id: 3245,
                    first_name: 'Sally',
                    last_name: 'Smith',
                ),
                Test_User::of(
                    id: 5342,
                    first_name: 'Jane',
                    last_name: 'Jones',
                ),
                Test_User::of(
                    id: 5623,
                    first_name: 'Peter',
                    last_name: 'Doe',
                ),
            ),
        );
    }

    public static function add_single(): void {
        Collection::of(
            items: [
                'a',
                'b',
                'c',
            ],
        )
            ->log()
            ->add(
                'e',
            )
            ->log()
        ;
    }

    /**
     * @return void
     */
    public static function add_multiple(): void {
        Collection::of(
            items: [
                'a',
                'b',
                'c',
            ],
        )
            ->log()
            ->add(
                'e',
                'f',
            )
            ->log()
        ;
    }

    /**
     * @return void
     */
    public static function generics(): void {
        // @var Collection<Test_Object_1>
        // $x = Collection::of(
        //     [Test_Object_1::create()],
        // )
        //     ->add(item: Test_Object_2::create())
        // ;
    }

    /**
     * @return void
     */
    private static function map_product_category(): void {
        // Collection::create_from(items: [
        //     0 => 36473,
        //     1 => 36481,
        // ])
        //     ->log()
        //     ->map(
        //         callback: fn (int $item): string => Product_Categories::create()
        //             ->find_by_id(id: $item)->name . " [#{$item}]",
        //     )
        //     ->log()
        // ;
    }

    /**
     * @return void
     */
    private static function pluck_array(): void {
        Error_Logger::log(
            Collection::of(
                [
                    'id'         => 2135,
                    'first_name' => 'John',
                    'last_name'  => 'Doe',
                ],
                [
                    'id'         => 3245,
                    'first_name' => 'Sally',
                    'last_name'  => 'Smith',
                ],
                [
                    'id'         => 5342,
                    'first_name' => 'Jane',
                    'last_name'  => 'Jones',
                ],
                [
                    'id'         => 5623,
                    'first_name' => 'Peter',
                    'last_name'  => 'Doe',
                ],
            )
                ->log()
                ->pluck(key: 'first_name'),
        );
    }

    /**
     * @return void
     */
    private static function pluck_object(): void {
        Error_Logger::log(
            output: Collection::of(
                Test_User::of(
                    id: 2135,
                    first_name: 'John',
                    last_name: 'Doe',
                ),
                Test_User::of(
                    id: 3245,
                    first_name: 'Sally',
                    last_name: 'Smith',
                ),
                Test_User::of(
                    id: 5342,
                    first_name: 'Jane',
                    last_name: 'Jones',
                ),
                Test_User::of(
                    id: 5623,
                    first_name: 'Peter',
                    last_name: 'Doe',
                ),
            )
                ->log()
                ->pluck(key: 'first_name'),
        );
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
