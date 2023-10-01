<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Factory\Tests\Unit;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Factory\Name_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Name\Factory\Name_Factory
 *
 * @internal
 *
 * @small
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Name_Factory::class,
            actual: Name_Factory::of(basename: '', fallback_name: ''),
        );
    }
}
