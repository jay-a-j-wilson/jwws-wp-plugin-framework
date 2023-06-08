<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Comparison;

use JWWS\WPPF\Assertion\Number_Assertion\Number_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\Number_Assertion\Number_Assertion
 *
 * @internal
 */
final class Is_Less extends TestCase {
    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Comparison\Data_Provider::is_less
     *
     * @testdox pass[$_dataName] => $arg_2 less than $arg_1
     */
    public function pass(int|float $arg_1, int|float $arg_2): void {
        $this->expectNotToPerformAssertions();
        Number_Assertion::of(number: $arg_1)->is_less(max: $arg_2);
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Comparison\Data_Provider::is_greater
     *
     * @testdox throw[$_dataName] => $arg_2 not less than $arg_1
     */
    public function throw(int|float $arg_1, int|float $arg_2): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Number_Assertion::of(number: $arg_1)->is_less(max: $arg_2);
    }
}
