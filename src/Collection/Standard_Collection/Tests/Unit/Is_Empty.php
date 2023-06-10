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
final class Is_Empty extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertFalse(
            condition: Collection_Factory::create_and_get()->is_empty(),
        );
    }
}
