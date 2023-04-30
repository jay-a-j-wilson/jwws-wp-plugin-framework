<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\Path_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\Path_Assertion\Path_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers Path_Assertion
 */
final class Contains_Dir extends TestCase {
    /**
     * @test
     *
     * @testdox "$path" contains directory.
     *
     * @testWith
     * ["folder/file.txt"]
     * ["folder/.txt"]
     * ["folder/subfolder/file.html"]
     */
    public function pass(string $path): void {
        $this->expectNotToPerformAssertions();
        Path_Assertion::of(path: $path)->contains_dir();
    }

    /**
     * @test
     *
     * @testdox "$path" not contains directory.
     *
     * @testWith
     * ["file.txt"]
     * [".txt"]
     * ["txt"]
     */
    public function throw(string $path): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Path_Assertion::of(path: $path)->contains_dir();
    }
}
