<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Factory\Tests\Unit;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Factory\Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Basename\Factory\Factory
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
            expected: Factory::class,
            actual: Factory::of(path: ''),
        );
    }
}
