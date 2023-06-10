<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection\Tests\Unit;

use JWWS\WPPF\{
    Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 */
final class Implode extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertEquals(
            expected: 'one, two, three, four, five',
            actual: Collection_Factory::create_and_get()->implode(),
        );
    }
}
