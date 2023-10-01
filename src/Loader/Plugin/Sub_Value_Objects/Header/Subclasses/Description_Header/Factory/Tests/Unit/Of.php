<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Description_Header\Factory\Tests\Unit;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Description_Header\Factory\Description_Header_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Header\Subclasses\Description_Header\Factory\Description_Header_Factory
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
            expected: Description_Header_Factory::class,
            actual: Description_Header_Factory::of(basename: ''),
        );
    }
}
