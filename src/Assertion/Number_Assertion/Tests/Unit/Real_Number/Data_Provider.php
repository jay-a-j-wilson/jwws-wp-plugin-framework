<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Real_Number;

final class Data_Provider {
    public static function positive_numbers(): iterable {
        yield 'positive (int)' => [1];

        yield 'positive (float)' => [1.0];
    }

    public static function negative_numbers(): iterable {
        yield 'negative (int)' => [-1];

        yield 'negative (float)' => [-1.0];
    }

    public static function naught_numbers(): iterable {
        yield 'zero (int)' => [0];

        yield 'zero (float)' => [0.0];
    }
}
