<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Tests\Integration\Fixtures;

use JWWS\WPPF\Loader\Plugin\Plugin;

/**
 * @internal
 */
final class Basic_Plugin {
    /**
     * @throws \InvalidArgumentException
     */
    public static function create_and_get(): Plugin {
        return self::create()->value;
    }

    /**
     * @throws \InvalidArgumentException
     */
    public static function create(): self {
        return new self(
            value: Plugin::of_slug(
                slug: 'plugin',
                fallback_name: 'Plugin',
            ),
        );
    }

    /**
     * @return void
     */
    private function __construct(public readonly Plugin $value) {
    }
}
