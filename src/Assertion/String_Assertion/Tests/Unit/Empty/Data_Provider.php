<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Empty;

/**
 * Undocumented class.
 */
final class Data_Provider {
    /**
     * Values that should be considered empty.
     */
    public static function empty(): array {
        return [
            [''],
        ];
    }

    /**
     * Values that should not be considered empty.
     */
    public static function not_empty(): array {
        return [
            ['foo'],
            ['empty'],
            [' '],
            ['null'],
            ['false'],
            ['0'],
            ['00'],
            ['0.0'],
        ];
    }
}
