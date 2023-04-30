<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Statement_Assertion\Tests\Unit;

/**
 * Parity.
 */
final class Data_Provider {
    /**
     * Truthy values with strict_types enabled.
     */
    public static function strict_truthy(): array {
        return [
            [true],
        ];
    }

    /**
     * Truthy values without strict_types enabled.
     */
    public static function truthy(): array {
        return [
            'boolean'          => [true],
            'int'              => [1],
            'int (negative)'   => [-1],
            'float'            => [1.0],
            'float (negative)' => [-1.0],
            'string'           => ['a'],
            'array'            => [[1]],
        ];
    }

    /**
     * Falsey values with strict_types enabled.
     */
    public static function strict_falsey(): array {
        return [
            [false],
        ];
    }

    /**
     * Falsey values without strict_types enabled.
     */
    public static function falsey(): array {
        return [
            'boolean'          => [false],
            'null'             => [null],
            'int'              => [0],
            'float'            => [0.0],
            'float (negative)' => [-0.0],
            'string (empty)'   => [''],
            'string of 0'      => ['0'],
            'array (empty)'    => [[]],
        ];
    }
}
