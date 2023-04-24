<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Tests;

use JWWS\WPPF\Assertion\Assertion;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\{
    Test,
    TestDox,
    CoversClass
};

#[CoversClass(Assertion::class)]
final class Unit_Test extends TestCase {
    #[Test]
    public function can_run(): void {
        $this->assertTrue(true);
    }
}
