<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Statement_Assertion\Tests\Unit\False;

use JWWS\WPPF\Assertion\Statement_Assertion\Statement_Assertion;
use JWWS\WPPF\Assertion\Statement_Assertion\Tests\Data_Provider;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    DataProviderExternal,
    Test,
    TestDox
};
use PHPUnit\Framework\TestCase;

// #[CoversClass(className: Statement_Assertion::class)]

/**
 * @covers Statement_Assertion
 */
final class Is_Not_False extends TestCase {
    // #[Test]
    // #[TestDox(text: '"$statement" not false')]
    // #[DataProviderExternal(
    //     className: Data_Provider::class,
    //     methodName: 'truthy',
    // )]

    /**
     * @test
     *
     * @testdox "$statement" not false
     *
     * @dataProvider JWWS\WPPF\Assertion\Statement_Assertion\Tests\Unit\Data_Provider::truthy
     */
    public function pass(mixed $statement): void {
        $this->expectNotToPerformAssertions();
        Statement_Assertion::of(statement: $statement)
            ->is_not_false()
        ;
    }

    // #[Test]
    // #[TestDox(text: '"$statement" false"')]
    // #[DataProviderExternal(
    //     className: Data_Provider::class,
    //     methodName: 'falsey',
    // )]

    /**
     * @test
     *
     * @testdox "$statement" false
     *
     * @dataProvider JWWS\WPPF\Assertion\Statement_Assertion\Tests\Unit\Data_Provider::falsey
     */
    public function throw(mixed $statement): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Statement_Assertion::of(statement: $statement)
            ->is_not_false()
        ;
    }
}
