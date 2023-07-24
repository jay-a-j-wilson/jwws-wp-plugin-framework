<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Type_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\Type_Assertion\Type_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\Type_Assertion\Type_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Callable extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(mixed $arg): void {
        $this->expectNotToPerformAssertions();
        Type_Assertion::of(type: $arg)->is_callable();
    }

    public static function pass_data_provider(): iterable {
        yield 'native function' => ['count'];

        yield 'anonymous function' => [fn () => 'hello world'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(mixed $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Type_Assertion::of(type: $arg)->is_callable();
    }

    public static function throw_data_provider(): iterable {
        yield 'native function, not exist' => ['non_existent_function'];
    }
}
