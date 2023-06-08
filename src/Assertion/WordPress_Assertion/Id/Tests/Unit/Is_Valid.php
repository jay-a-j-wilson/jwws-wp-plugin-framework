<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\WordPress_Assertion\Id\Tests\Unit;

use JWWS\WPPF\Assertion\WordPress_Assertion\Id\Id as WordPress_Id_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\WordPress_Assertion\Id\Id
 *
 * @internal
 */
final class Is_Valid extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg returns $arg
     */
    public function pass(int $arg): void {
        $this->expectNotToPerformAssertions();
        WordPress_Id_Assertion::of(id: $arg)->is_valid();
    }

    public static function pass_data_provider(): iterable {
        yield [1];

        yield [10];

        yield [1000];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => arg $arg throws e $message
     */
    public function throw(int $arg, string $message): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        $this->expectExceptionMessageMatches(regularExpression: "/{$message}/");
        WordPress_Id_Assertion::of(id: $arg)->is_valid();
    }

    public static function throw_data_provider(): iterable {
        yield 'zero' => [0, 'Cannot be zero.'];

        yield 'negative number' => [-1, 'Cannot be a negative number.'];
    }
}
