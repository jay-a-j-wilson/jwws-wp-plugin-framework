<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Fixtures;

use JWWS\WPPF\Collection\{
    Collection,
    Standard_Collection\Standard_Collection
};

/**
 * @internal
 */
final class Collection_Factory {
    public static function create(): self {
        return new self(
            value: Standard_Collection::of(
                'one',
                'two',
                'three',
                'four',
                'five',
            ),
        );
    }

    public static function create_and_get(): Collection {
        return self::create()->value;
    }

    /**
     * @return void
     */
    private function __construct(public readonly Collection $value) {
    }
}
