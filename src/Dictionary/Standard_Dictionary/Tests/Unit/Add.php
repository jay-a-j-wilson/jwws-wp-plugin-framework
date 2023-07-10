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
final class Add extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertCount(
            expectedCount: 2,
            haystack: Dictionary_Factory::create_and_get(),
        );
    }
}
