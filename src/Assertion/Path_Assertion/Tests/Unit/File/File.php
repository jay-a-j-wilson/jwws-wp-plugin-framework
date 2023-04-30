<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Path_Assertion\Tests\Unit\File;

use JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers Path_Assertion
 */
final class File extends TestCase {
    /**
     * @test
     *
     * @testdox "$path" is a file.
     *
     * @testWith
     * ["file_1.php"]
     * ["file_2.txt"]
     * ["file_3.html"]
     */
    public function pass(string $path): void {
        $this->expectNotToPerformAssertions();
        Path_Assertion::of(path: __DIR__ . $path)->is_file();
    }

    /**
     * @test
     *
     * @testdox "$path" is not a file.
     *
     * @testWith
     * ["foo.txt"]
     * ["bar.html"]
     * ["foobar.php"]
     * ["test_files"]
     */
    public function throw(string $path): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Path_Assertion::of(path: __DIR__ . $path)->is_file();
    }
}
