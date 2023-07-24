<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Ctype;

use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\String_Assertion\String_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Alphabetic extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(string $arg): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $arg)->is_alphabetic();
    }

    public static function pass_data_provider(): iterable {
        yield ['a'];

        yield ['B'];

        yield ['aB'];
    }

    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Ctype\Data_Provider::special_characters
     * @dataProvider \JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Ctype\Data_Provider::number_characters
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $arg)->is_alphabetic();
    }
}
