<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Statement_Assertion\Tests\True;

use JWWS\WPPF\Assertion\Statement_Assertion\Statement_Assertion;
use JWWS\WPPF\Assertion\Statement_Assertion\Tests\Data_Provider;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    DataProviderExternal,
    Test,
    TestDox
};
use PHPUnit\Framework\TestCase;

#[CoversClass(className: Statement_Assertion::class)]
final class True__Unit_Test extends TestCase {
    #[Test]
    #[TestDox(text: '"$statement" true"')]
    #[DataProviderExternal(
        className: Data_Provider::class,
        methodName: 'truthy',
    )]
    public function pass(mixed $statement): void {
        $this->expectNotToPerformAssertions();
        Statement_Assertion::of(statement: $statement)
            ->true()
        ;
    }

    #[Test]
    #[TestDox(text: '"$statement" not true')]
    #[DataProviderExternal(
        className: Data_Provider::class,
        methodName: 'falsey',
    )]
    public function throw(mixed $statement): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Statement_Assertion::of(statement: $statement)
            ->true()
        ;
    }
}
