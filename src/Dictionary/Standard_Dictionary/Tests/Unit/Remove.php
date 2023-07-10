<?php declare(strict_types=1);

namespace JWWS\WPPF\Dictionary\Standard_Dictionary\Tests\Unit;

use JWWS\WPPF\Dictionary\Standard_Dictionary\Tests\Unit\Fixtures\Dictionary_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Dictionary\Standard_Dictionary\Standard_Dictionary
 *
 * @internal
 *
 * @small
 */
final class Remove extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertCount(
            expectedCount: 1,
            haystack: Dictionary_Factory::create_and_get()
                ->remove(key: 'key_1'),
        );
    }

    /**
     * @test
     */
    public function throw(): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        $this->expectExceptionMessage(
            message: 'Entry with key of key_3 not found.',
        );

        Dictionary_Factory::create_and_get()
            ->remove(key: 'key_3')
        ;
    }
}
