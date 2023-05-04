<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Empty;

use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers String_Assertion
 */
final class Not_Empty extends TestCase {
    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Empty\Data_Provider::not_empty
     *
     * @testdox pass: "$string" not empty
     */
    public function pass(string $string): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $string)->not_empty();
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Empty\Data_Provider::empty
     *
     * @testdox throw: "$string" empty
     */
    public function throw(string $string): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $string)->not_empty();
    }
}
