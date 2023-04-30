<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Path_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers Path_Assertion
 */
final class Extension extends TestCase {
    /**
     * @test
     *
     * @testdox "$path" is "$ext".
     *
     * @testWith
     * ["file.php", "php"]
     * ["folder/file.txt", "txt"]
     * ["folder/subfolder/file.html", "html"]
     * [".php", "php"]
     * ["php", "php"]
     */
    public function pass(string $path, string $ext): void {
        $this->expectNotToPerformAssertions();
        Path_Assertion::of(path: $path)->has_extension(ext: $ext);
    }

    /**
     * @test
     *
     * @testdox "$path" is not "$ext".
     *
     * @testWith
     * ["file.php", "txt"]
     * ["folder/file.txt", "html"]
     * ["folder/subfolder/file.html", "php"]
     */
    public function throw(string $path, string $ext): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Path_Assertion::of(path: $path)->has_extension(ext: $ext);
    }
}
