<?php declare(strict_types=1);

namespace JWWS\WPPF\Dictionary\Tests\Unit;

use JWWS\WPPF\Dictionary\Standard_Dictionary\Tests\Unit\Fixtures\Dictionary_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Dictionary\Standard_Dictionary\Standard_Dictionary
 *
 * @internal
 *
 * @small
 */
final class Clear extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertCount(
            expectedCount: 0,
            haystack: Dictionary_Factory::create_and_get()
                ->clear(),
        );
    }
}
