<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Tests\Integration;

use JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;

/**
 * @covers \JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta
 *
 * @internal
 *
 * @small
 */
final class Of extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => arg $arg returns $arg
     */
    public function pass(int $arg): void {
        self::assertInstanceOf(
            expected: Post_Meta::class,
            actual: Post_Meta::of(id: $arg),
        );
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
        Post_Meta::of(id: $arg);
    }

    public static function throw_data_provider(): iterable {
        yield 'zero' => [0, 'Cannot be zero.'];

        yield 'negative number' => [-1, 'Cannot be a negative number.'];
    }
}
