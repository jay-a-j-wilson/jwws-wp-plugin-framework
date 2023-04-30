<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    Test,
    TestDox,
    TestWith
};
use PHPUnit\Framework\TestCase;

// #[CoversClass(className: String_Assertion::class)]
/**
 * @covers String_Assertion
 */
final class Equals extends TestCase {
    // #[Test]
    // #[TestDox(text: '"$actual" equals "$expected"')]
    // #[TestWith(data: ['hello world', 'hello world'])]

    /**
     * @test
     *
     * @testdox "$actual" equals "$expected"
     *
     * @testWith
     * ["hello world", "hello world"]
     */
    public function pass(string $actual, mixed $expected): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $actual)
            ->equals(string: $expected)
        ;
    }

    // #[Test]
    // #[TestDox(text: '"$actual" not equals "$expected"')]
    // #[TestWith(data: ['hello world', 'foo'])]
    // #[TestWith(data: ['hello world', ' hello world '])]

    /**
     * @test
     *
     * @testdox "$actual" not equals "$expected"
     *
     * @testWith
     * ["hello world", "foo"]
     * ["hello world", " hello world "]
     */
    public function throw(string $actual, mixed $expected): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $actual)
            ->equals(string: $expected)
        ;
    }
}
