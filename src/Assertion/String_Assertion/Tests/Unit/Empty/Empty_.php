<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Empty;

use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    DataProviderExternal,
    Test,
    TestDox,
};
use PHPUnit\Framework\TestCase;

// #[CoversClass(className: String_Assertion::class)]
/**
 * @covers String_Assertion
 */
final class Empty_ extends TestCase {
    // #[Test]
    // #[TestDox(text: '"$string" empty')]
    // #[DataProviderExternal(
    //     className: Data_Provider::class,
    //     methodName: 'empty',
    // )]

    /**
     * @test
     *
     * @testdox "$string" empty
     *
     * @dataProvider \JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Empty\Data_Provider::empty
     */
    public function pass(string $string): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $string)
            ->empty()
        ;
    }

    // #[Test]
    // #[TestDox(text: '"$string" not empty')]
    // #[DataProviderExternal(
    //     className: Data_Provider::class,
    //     methodName: 'not_empty',
    // )]

    /**
     * @test
     *
     * @testdox "$string" not empty
     *
     * @dataProvider \JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Empty\Data_Provider::not_empty
     */
    public function throw(string $string): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $string)
            ->empty()
        ;
    }
}
