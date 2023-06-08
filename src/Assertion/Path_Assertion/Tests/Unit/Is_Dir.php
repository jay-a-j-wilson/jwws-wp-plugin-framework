<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Path_Assertion\Tests\Unit\Is_File;

use JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion
 *
 * @internal
 */
final class Is_Dir extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg
     */
    public function pass(string $arg): void {
        $this->expectNotToPerformAssertions();
        Path_Assertion::of(path: __DIR__ . "/test_files/{$arg}")->is_dir();
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => ['dir'];
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
        Path_Assertion::of(path: __DIR__ . "/test_files/{$arg}")->is_dir();
    }

    public static function throw_data_provider(): iterable {
        yield 'file' => ['file.txt'];

        yield 'missing, file' => ['missing.txt'];

        yield 'missing, dir' => ['test_files'];
    }
}
