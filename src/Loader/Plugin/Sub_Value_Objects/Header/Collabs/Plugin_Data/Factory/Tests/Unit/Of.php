<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Plugin_Data\Factory\Tests\Unit;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Plugin_Data\Factory\Plugin_Data_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Plugin_Data\Factory\Plugin_Data_Factory
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
            expected: Plugin_Data_Factory::class,
            actual: Plugin_Data_Factory::of(basename: ''),
        );
    }
}
