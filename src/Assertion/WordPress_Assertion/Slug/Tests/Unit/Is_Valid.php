<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\WordPress_Assertion\Slug\Tests\Unit;

use JWWS\WPPF\Assertion\WordPress_Assertion\Slug\Slug as WordPress_Slug_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\WordPress_Assertion\Slug\Slug
 *
 * @internal
 *
 * @small
 */
final class Is_Valid extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg returns $arg
     */
    public function pass(string $arg): void {
        $this->expectNotToPerformAssertions();
        WordPress_Slug_Assertion::of(slug: $arg)->is_valid();
    }

    public static function pass_data_provider(): iterable {
        yield 'string' => ['slug'];

        yield 'string, number' => ['slug1'];

        yield 'string, number, hyphen' => ['slug-1'];

        yield 'string, number, underscore' => ['slug_1'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => arg $arg throws e $message
     */
    public function throw(string $arg, string $message): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        $this->expectExceptionMessageMatches(regularExpression: "/{$message}/");
        WordPress_Slug_Assertion::of(slug: $arg)->is_valid();
    }

    public static function throw_data_provider(): iterable {
        yield 'blank' => ['', 'Cannot be blank.'];

        yield 'uppercase' => ['Slug', 'Cannot contain uppercase letters.'];

        yield 'whitespace' => ['slug 1', 'Cannot contain whitespace.'];

        yield 'invalid char' => ['slug1!', 'must be a valid WordPress slug.'];
    }
}
