<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Real_Number;

use JWWS\WPPF\Assertion\Number_Assertion\Number_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\Number_Assertion\Number_Assertion
 *
 * @internal
 */
final class Is_Positive extends TestCase {
    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Real_Number\Data_Provider::positive_numbers
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(int|float $arg): void {
        $this->expectNotToPerformAssertions();
        Number_Assertion::of(number: $arg)->is_positive();
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Real_Number\Data_Provider::naught_numbers
     * @dataProvider \JWWS\WPPF\Assertion\Number_Assertion\Tests\Unit\Real_Number\Data_Provider::negative_numbers
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(int|float $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Number_Assertion::of(number: $arg)->is_positive();
    }
}
