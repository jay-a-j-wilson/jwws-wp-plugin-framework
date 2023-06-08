<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\File_Assertion\Tests\Unit\Size;

use JWWS\WPPF\Assertion\File_Assertion\File_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\File_Assertion\File_Assertion
 *
 * @internal
 */
final class Has_Size extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1 is $arg_2 bytes
     */
    public function pass(string $arg_1, int $arg_2): void {
        self::expectNotToPerformAssertions();
        File_Assertion::of(filepath: __DIR__ . "/test_files/{$arg_1}")
            ->has_size(size: $arg_2)
        ;
    }

    public static function pass_data_provider(): iterable {
        yield ['file.txt', 7];

        yield ['blank.txt', 0];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg_1 is not $arg_2 bytes
     */
    public function throw(string $arg_1, int $arg_2): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        File_Assertion::of(filepath: __DIR__ . "/test_files/{$arg_1}")
            ->has_size(size: $arg_2)
        ;
    }

    public static function throw_data_provider(): iterable {
        yield ['file.txt', 100];

        yield ['blank.txt', 500];
    }
}
