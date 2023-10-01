<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Function_Availability_Checker\Tests\Unit;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Function_Availability_Checker\Function_Availability_Checker;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Collabs\Function_Availability_Checker\Function_Availability_Checker
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
            expected: Function_Availability_Checker::class,
            actual: Function_Availability_Checker::new_instance(),
        );
    }
}
