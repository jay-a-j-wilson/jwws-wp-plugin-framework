<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion\Tests;

use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    Test,
    TestDox,
    TestWith
};
use PHPUnit\Framework\TestCase;

#[CoversClass(className: String_Assertion::class)]
final class Starts_With__Unit_Test extends TestCase {
    #[Test]
    #[TestDox(text: '"$string" not starts with "$prefix"')]
    #[TestWith(data: ['hello world', 'foo'])]
    #[TestWith(data: ['hello world', 'world'])]
    #[TestWith(data: ['hello world', ' hello'])]
    public function invalid_arg_throw_exception(
        string $string,
        string $prefix,
    ): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $string)
            ->starts_with(prefix: $prefix)
        ;
    }

    #[Test]
    #[TestDox(text: '"$string" starts with "$prefix"')]
    #[TestWith(data: ['hello world', 'he'])]
    #[TestWith(data: ['hello world', 'hello'])]
    #[TestWith(data: ['hello world', 'hello w'])]
    public function pass(
        string $string,
        mixed $prefix,
    ): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $string)
            ->starts_with(prefix: $prefix)
        ;
    }
}
