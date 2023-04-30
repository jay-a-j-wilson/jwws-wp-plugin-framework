<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Path_Assertion\Tests\Unit\Exists;

use JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers Path_Assertion
 */
final class Exists extends TestCase {
    /**
     * @test
     *
     * @testdox "$path" exists
     *
     * @testWith
     * ["file_1.php"]
     * ["file_2.txt"]
     * ["file_3.html"]
     */
    public function pass(string $path): void {
        $this->expectNotToPerformAssertions();
        Path_Assertion::of(path: __DIR__ . "/test_files/{$path}")->exists();
    }

    /**
     * @test
     *
     * @testdox "$path" not exists.
     *
     * @testWith
     * ["foo.txt"]
     * ["bar.html"]
     * ["foobar.php"]
     * ["test_files"]
     */
    public function throw(string $path): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Path_Assertion::of(path: __DIR__ . "/test_files/{$path}")->exists();
    }
}
