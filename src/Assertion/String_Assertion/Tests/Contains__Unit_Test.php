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
final class Contains__Unit_Test extends TestCase {
    #[Test]
    #[TestDox(text: '"$string" not contains "$substring"')]
    #[TestWith(data: ['hello world', 'foo'])]
    #[TestWith(data: ['hello world', ' he'])]
    #[TestWith(data: ['hello world', 'helllo '])]
    #[TestWith(data: ['hello world', 'w orld '])]
    public function throw(
        string $string,
        mixed $substring,
    ): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $string)
            ->contains(substring: $substring)
        ;
    }

    #[Test]
    #[TestDox(text: '"$string" contains "$substring"')]
    #[TestWith(data: ['hello world', 'hello'])]
    #[TestWith(data: ['hello world', 'world'])]
    #[TestWith(data: ['hello world', 'o w'])]
    public function pass(
        string $string,
        mixed $substring,
    ): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $string)
            ->contains(substring: $substring)
        ;
    }
}
