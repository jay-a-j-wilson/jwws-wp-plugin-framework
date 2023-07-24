<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Empty;

use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\String_Assertion\String_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Empty extends TestCase {
    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Empty\Data_Provider::empty
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(string $arg): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $arg)->is_empty();
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Empty\Data_Provider::not_empty
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $arg)->is_empty();
    }
}
