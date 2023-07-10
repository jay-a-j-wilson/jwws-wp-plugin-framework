<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Countable;

use JWWS\WPPF\{
    Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory
};
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 */
final class Count extends TestCase {
    /**
     * @test
     * 
     * ? Possibly integration test.
     */
    public function pass(): void {
        $sut = Collection_Factory::create_and_get();

        self::assertEquals(expected: 5, actual: $sut->count());
        $sut->add(items: 'six');
        self::assertEquals(expected: 6, actual: $sut->count());
    }
}
