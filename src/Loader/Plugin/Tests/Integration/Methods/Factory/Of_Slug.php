<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Tests\Integration\Methods\Factory;

use JWWS\WPPF\Loader\Plugin\Plugin;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Plugin
 *
 * @internal
 */
final class Of_Slug extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Plugin::class,
            actual: Plugin::of_slug(slug: 'plugin', fallback_name: "Plugin"),
        );
    }
}