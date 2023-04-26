<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion\Tests\Empty;

use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    DataProviderExternal,
    Test,
    TestDox,
};
use PHPUnit\Framework\TestCase;

#[CoversClass(className: String_Assertion::class)]
final class Empty__Unit_Test extends TestCase {
    #[Test]
    #[TestDox(text: '"$string" not empty')]
    #[DataProviderExternal(
        className: Data_Provider::class,
        methodName: 'not_empty',
    )]
    public function invalid_arg_throw_exception(string $string): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        String_Assertion::of(string: $string)
            ->empty()
        ;
    }

    #[Test]
    #[TestDox(text: '"$string" empty')]
    #[DataProviderExternal(
        className: Data_Provider::class,
        methodName: 'empty',
    )]
    public function valid_arg_pass(string $string): void {
        $this->expectNotToPerformAssertions();
        String_Assertion::of(string: $string)
            ->empty()
        ;
    }
}
