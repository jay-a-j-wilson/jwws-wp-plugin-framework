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

// #[CoversClass(className: Statement_Assertion::class)]

/**
 * @covers Statement_Assertion
 */
final class Is_True extends TestCase {
    // #[Test]
    // #[TestDox(text: '"$statement" true"')]
    // #[DataProviderExternal(
    //     className: Data_Provider::class,
    //     methodName: 'truthy',
    // )]

    /**
     * @test
     * 
     * @testdox "$statement" true"
     *
     * @dataProvider JWWS\WPPF\Assertion\Statement_Assertion\Tests\Unit\Data_Provider::truthy
     */
    public function pass(mixed $statement): void {
        $this->expectNotToPerformAssertions();
        Statement_Assertion::of(statement: $statement)
            ->is_true()
        ;
    }

    // #[Test]
    // #[TestDox(text: '"$statement" not true')]
    // #[DataProviderExternal(
    //     className: Data_Provider::class,
    //     methodName: 'falsey',
    // )]

    /**
     * @test
     * 
     * @testdox "$statement" not true
     *
     * @dataProvider JWWS\WPPF\Assertion\Statement_Assertion\Tests\Unit\Data_Provider::falsey
     */
    public function throw(mixed $statement): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Statement_Assertion::of(statement: $statement)
            ->is_true()
        ;
    }
}
