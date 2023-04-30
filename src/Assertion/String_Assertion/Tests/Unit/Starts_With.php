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
final class Starts_With extends TestCase {
    // #[Test]
    // #[TestDox(text: '"$string" starts with "$prefix"')]
    // #[TestWith(data: ['hello world', 'he'])]
    // #[TestWith(data: ['hello world', 'hello'])]
    // #[TestWith(data: ['hello world', 'hello w'])]

    /**
     * @test
     *
     * @testdox "$string" starts with "$prefix"
     *
     * @testWith
     * ["hello world", "he"]
     * ["hello world", "hello"]
     * ["hello world", "hello w"]
     */
    public function pass(string $string, mixed $prefix): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $string)
            ->starts_with(prefix: $prefix)
        ;
    }

    // #[Test]
    // #[TestDox(text: '"$string" not starts with "$prefix"')]
    // #[TestWith(data: ['hello world', 'foo'])]
    // #[TestWith(data: ['hello world', 'world'])]
    // #[TestWith(data: ['hello world', ' hello'])]

    /**
     * @test
     *
     * @testdox "$string" not starts with "$prefix"
     *
     * @testWith
     * ["hello world", "foo"]
     * ["hello world", "world"]
     * ["hello world", " hello w"]
     */
    public function throw(string $string, string $prefix): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $string)
            ->starts_with(prefix: $prefix)
        ;
    }
}
