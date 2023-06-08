<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Path_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: Path_Assertion::class,
            actual: Path_Assertion::of(path: ''),
        );
    }
}
