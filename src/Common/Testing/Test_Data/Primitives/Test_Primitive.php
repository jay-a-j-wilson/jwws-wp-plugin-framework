<?php

namespace JWWS\WPPF\Common\Testing\Test_Data\Primitives;

use JWWS\WPPF\Common\Security\Security;

// Security::stop_direct_access();

/**
 * Undocumented trait.
 */
trait Test_Primitive {
    /**
     * Undocumented function.
     */
    public static function int_0(): int {
        return 0;
    }

    /**
     * Undocumented function.
     */
    public static function int_1(): int {
        return 1;
    }

    /**
     * Undocumented function.
     *
     * @return int
     */
    public static function string_abc(): string {
        return 'abc';
    }

    /**
     * @return array<int>
     */
    public static function array_int(): array {
        return [1, 2, 3];
    }

    /**
     * @return array<string>
     */
    public static function array_string(): array {
        return ['a', 'b', 'c'];
    }

    /**
     * Undocumented function.
     */
    public static function associate_array_mixed(): array {
        return [
            1 => 'a',
            2 => 'b',
            3 => 'c',
            4 => [
                'a' => '1',
                'b' => '2',
                'c' => 3,
            ],
            5 => 'e',
        ];
    }
}
