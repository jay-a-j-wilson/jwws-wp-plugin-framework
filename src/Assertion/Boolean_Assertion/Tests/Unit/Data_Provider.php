<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Unit\Boolean;

final class Data_Provider {
    /**
     * Truthy values with strict_types enabled.
     */
    public static function strict_truthy(): iterable {
        yield [true];
    }

    /**
     * Truthy values without strict_types enabled.
     */
    public static function truthy(): iterable {
        yield 'boolean' => [true];

        yield 'int' => [1];

        yield 'int (negative)' => [-1];

        yield 'float' => [1.0];

        yield 'float (negative)' => [-1.0];

        yield 'string' => ['a'];

        yield 'array' => [[1]];
    }

    /**
     * Falsey values with strict_types enabled.
     */
    public static function strict_falsey(): iterable {
        yield [false];
    }

    /**
     * Falsey values without strict_types enabled.
     */
    public static function falsey(): iterable {
        yield 'boolean' => [false];

        yield 'null' => [null];

        yield 'int' => [0];

        yield 'float' => [0.0];

        yield 'float (negative)' => [-0.0];

        yield 'string (empty)' => [''];

        yield 'string of 0' => ['0'];

        yield 'array (empty)' => [[]];
    }
}
