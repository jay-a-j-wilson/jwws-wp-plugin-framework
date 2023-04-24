<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Tests;

use JWWS\WPPF\Collection\Collection;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\{
    Test,
    TestDox,
    CoversClass
};

#[CoversClass(Collection::class)]
final class Unit_Test extends TestCase {
    #[Test]
    public function can_run(): void {
        $this->assertTrue(true);
    }

    #[Test]
    public function can_echo_class_name(): void {
        $this->expectOutputString(
            Collection::class,
        );

        echo __NAMESPACE__ . '\Collection';
    }

    #[Test]
    public function can_init_class(): void {
        $this->assertInstanceOf(
            expected: Collection::class,
            actual: Collection::of('a', 'b', 'c', 'd'),
        );
    }
}
