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
final class Alphanumeric extends TestCase {
    /**
     * @test
     *
     * @testdox "$string" alphanumeric
     *
     * @testWith
     * ["aBc123"]
     */
    public function pass(string $string): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $string)
            ->alphanumeric()
        ;
    }


    /**
     * @test
     *
     * @testdox "$string" not alphanumeric
     *
     * @testWith
     * [" "]
     * ["~"]
     * ["`"]
     * ["!"]
     * ["@"]
     * ["#"]
     * ["$"]
     * ["%"]
     * ["^"]
     * ["&"]
     * ["*"]
     * ["?"]
     * ["("]
     * [")"]
     * ["{"]
     * ["}"]
     * ["["]
     * ["]"]
     * ["<"]
     * [">"]
     * ["-"]
     * ["_"]
     * ["+"]
     * ["="]
     * ["'"]
     * ["\""]
     * ["|"]
     * ["\\"]
     * ["/"]
     * [":"]
     * [";"]
     * [","]
     * ["."]
     */
    public function throw(string $string): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $string)
        ->alphanumeric()
        ;
    }
}
