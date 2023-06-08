<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Unit\Boolean\True;

use JWWS\WPPF\Assertion\Boolean_Assertion\Boolean_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers JWWS\WPPF\Assertion\Boolean_Assertion\Boolean_Assertion
 */
final class Is_Not_True extends TestCase {
    /**
     * @test
     *
     * @dataProvider JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Unit\Boolean\Data_Provider::falsey
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(mixed $arg): void {
        $this->expectNotToPerformAssertions();
        Boolean_Assertion::of(boolean: $arg)->is_not_true();
    }

    /**
     * @test
     *
     * @dataProvider JWWS\WPPF\Assertion\Boolean_Assertion\Tests\Unit\Boolean\Data_Provider::truthy
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(mixed $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Boolean_Assertion::of(boolean: $arg)->is_not_true();
    }
}
