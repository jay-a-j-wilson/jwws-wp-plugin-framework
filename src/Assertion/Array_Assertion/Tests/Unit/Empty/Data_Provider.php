<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Array_Assertion\Tests\Unit\Empty;

final class Data_Provider {
    /**
     * Values that should be considered empty.
     */
    public static function empty(): iterable {
        yield [[]];
    }

    /**
     * Values that should not be considered empty.
     */
    public static function not_empty(): iterable {
        yield [['foo']];

        yield [['empty']];

        yield [[' ']];

        yield [['null']];

        yield [['false']];

        yield [['0']];

        yield [['00']];

        yield [['0.0']];
    }
}
