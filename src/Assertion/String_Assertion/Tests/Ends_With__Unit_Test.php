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
final class Ends_With__Unit_Test extends TestCase {
    #[Test]
    #[TestDox(text: '"$string" not ends with "$suffix"')]
    #[TestWith(data: ['hello world', 'foo'])]
    #[TestWith(data: ['hello world', 'hello '])]
    #[TestWith(data: ['hello world', 'world '])]
    public function throw(
        string $string,
        mixed $suffix,
    ): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $string)
            ->ends_with(suffix: $suffix)
        ;
    }

    #[Test]
    #[TestDox(text: '"$string" ends with "$suffix"')]
    #[TestWith(data: ['hello world', 'ld'])]
    #[TestWith(data: ['hello world', 'rld'])]
    #[TestWith(data: ['hello world', 'o world'])]
    public function pass(
        string $string,
        mixed $suffix,
    ): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $string)
            ->ends_with(suffix: $suffix)
        ;
    }
}
