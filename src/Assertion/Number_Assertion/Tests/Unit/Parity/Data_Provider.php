<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Parity;

final class Data_Provider {
    public static function odd_numbers(): iterable {
        yield 'one (int)' => [1];

        yield 'one (float)' => [1.0];

        yield 'three (int)' => [3];

        yield 'three (float)' => [3.0];

        yield 'five (int)' => [5];

        yield 'five (float)' => [5.0];
    }

    public static function even_numbers(): iterable {
        yield 'zero (int)' => [0];

        yield 'zero (float)' => [0.0];

        yield 'two (int)' => [2];

        yield 'two (float)' => [2.0];

        yield 'four (int)' => [4];

        yield 'four (float)' => [4.0];
    }
}
