<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\WordPress_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\WordPress_Assertion\WordPress_Assertion;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    Test,
    TestDox,
    TestWith
};
use PHPUnit\Framework\TestCase;

/**
 * @covers WordPress_Assertion
 */
final class Slug extends TestCase {
    /**
     * @test
     *
     * @testdox "$string" valid slug
     *
     * @testWith
     * ["slug"]
     * ["slug1"]
     * ["slug-1"]
     * ["slug_1"]
     */
    public function pass(string $string): void {
        $this->expectNotToPerformAssertions();
        WordPress_Assertion::of(string: $string)->slug();
    }

    /**
     * @test
     *
     * @testdox "$string" not valid slug. $message
     *
     * @testWith
     * ["", "Cannot be blank."]
     * ["Slug", "Cannot contain uppercase letters."]
     * ["slug 1", "Cannot contain whitespace."]
     * ["slug1!", "must be a valid WordPress slug."]
     */
    public function throw(string $string, string $message): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        $this->expectExceptionMessageMatches(regularExpression: "/{$message}/");
        WordPress_Assertion::of(string: $string)->slug();
    }
}