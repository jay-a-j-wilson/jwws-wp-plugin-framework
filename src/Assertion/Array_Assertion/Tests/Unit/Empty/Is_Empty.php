<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Array_Assertion\Tests\Unit\Empty;

use JWWS\WPPF\Assertion\Array_Assertion\Array_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\Array_Assertion\Array_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Empty extends TestCase {
    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Assertion\Array_Assertion\Tests\Unit\Empty\Data_Provider::empty
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(array $arg): void {
        $this->expectNotToPerformAssertions();
        Array_Assertion::of(array: $arg)->is_empty();
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Assertion\Array_Assertion\Tests\Unit\Empty\Data_Provider::not_empty
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(array $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Array_Assertion::of(array: $arg)->is_empty();
    }
}
