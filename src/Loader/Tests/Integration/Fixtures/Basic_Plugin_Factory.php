<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Tests\Integration\Fixtures;

use JWWS\WPPF\Loader\Plugin\{
    Plugin,
    Standard_Plugin\Standard_Plugin
};

/**
 * @internal
 */
final class Basic_Plugin_Factory {
    /**
     * @throws \InvalidArgumentException
     */
    public static function create(): self {
        return new self(
            value: Standard_Plugin::of_slug(
                slug: 'plugin',
                fallback_name: 'Plugin',
            ),
        );
    }

    /**
     * @throws \InvalidArgumentException
     */
    public static function create_and_get(): Plugin {
        return self::create()->value;
    }

    /**
     * @return void
     */
    private function __construct(public readonly Plugin $value) {}
}
