<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\String_Assertion\String_Assertion
 *
 * @internal
 *
 * @small
 */
final class Contains extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $string contains $substring
     */
    public function pass(string $string, mixed $substring): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $string)->contains(substring: $substring);
    }

    public static function pass_data_provider(): iterable {
        yield ['hello world', 'hello'];

        yield ['hello world', 'world'];

        yield ['hello world', 'o w'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $string not contains $substring
     */
    public function throw(string $string, mixed $substring): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $string)->contains(substring: $substring);
    }

    public static function throw_data_provider(): iterable {
        yield ['hello world', 'foo'];

        yield ['hello world', ' he'];

        yield ['hello world', 'helllo '];

        yield ['hello world', ' w orld'];
    }
}
