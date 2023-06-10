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
final class Reverse extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertEquals(
            expected: ['five', 'four', 'three', 'two', 'one'],
            actual: Collection_Factory::create_and_get()
                ->reverse()
                ->to_array(),
        );
    }
}