<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\File_Assertion\Tests\Unit\Size;

use JWWS\WPPF\Assertion\File_Assertion\File_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\File_Assertion\File_Assertion
 *
 * @internal
 *
 * @small
 */
final class Is_Blank extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(string $arg): void {
        self::expectNotToPerformAssertions();
        File_Assertion::of(filepath: __DIR__ . "/test_files/{$arg}")
            ->is_blank()
        ;
    }

    public static function pass_data_provider(): iterable {
        yield 'blank' => ['blank.txt'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(string $arg): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        File_Assertion::of(filepath: __DIR__ . "/test_files/{$arg}")
            ->is_blank()
        ;
    }

    public static function throw_data_provider(): iterable {
        yield 'not blank' => ['file.txt'];
    }
}
