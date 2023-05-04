<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Path_Assertion\Tests\Unit\Is_File;

use JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers Path_Assertion
 */
final class Is_File extends TestCase {
    /**
     * @test
     *
     * @testdox "$path" is a file.
     *
     * @dataProvider pass_data_provider
     */
    public function pass(string $path): void {
        $this->expectNotToPerformAssertions();
        Path_Assertion::of(path: __DIR__ . "/test_files/{$path}")->is_file();
    }

    public function pass_data_provider(): array {
        return [
            ['file_1.php'],
            ['file_2.txt'],
            ['file_3.html'],
        ];
    }

    /**
     * @test
     *
     * @testdox "$path" is not a file.
     *
     * @dataProvider throw_data_provider
     *
     * @testWith
     * ["foo.txt"]
     * ["bar.html"]
     * ["foobar.php"]
     * ["test_files"]
     */
    public function throw(string $path): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Path_Assertion::of(path: __DIR__ . "/test_files/{$path}")->is_file();
    }

    public function throw_data_provider(): array {
        return [
            ['foo.txt'],
            ['bar.html'],
            ['foobar.php'],
            ['test_files'],
        ];
    }
}
