<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Tests\Unit;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Dir;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Dir
 *
 * @internal
 *
 * @small
 */
final class New_Instance extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Dir::class,
            actual: Dir::new_instance(),
        );
    }
}
