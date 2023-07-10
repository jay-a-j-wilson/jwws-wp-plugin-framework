<?php declare(strict_types=1);

namespace JWWS\WPPF\Dictionary\Standard_Dictionary\Tests\Unit\Fixtures;

use JWWS\WPPF\Dictionary\{
    Dictionary,
    Standard_Dictionary\Standard_Dictionary
};

/**
 * @internal
 */
final class Dictionary_Factory {
    public static function create(): self {
        return new self(
            value: Standard_Dictionary::new_instance()
                ->add(key: 'key_1', value: 'value_1')
                ->add(key: 'key_2', value: 'value_2'),
        );
    }

    public static function create_and_get(): Dictionary {
        return self::create()->value;
    }

    /**
     * @return void
     */
    private function __construct(public readonly Dictionary $value) {}
}
