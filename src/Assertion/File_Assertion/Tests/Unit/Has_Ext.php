<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\File_Assertion\Tests\Unit;

use JWWS\WPPF\Assertion\File_Assertion\File_Assertion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Assertion\File_Assertion\File_Assertion
 *
 * @internal
 *
 * @small
 */
final class Has_Ext extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1 has ext $arg_2.
     */
    public function pass(string $arg_1, string $arg_2): void {
        $this->expectNotToPerformAssertions();
        File_Assertion::of(filepath: $arg_1)->has_ext(ext: $arg_2);
    }

    public static function pass_data_provider(): iterable {
        yield 'basic' => ['file.php', 'php'];

        yield 'no filename' => ['.php', 'php'];

        yield 'in dir' => ['folder/file.txt', 'txt'];

        yield 'in nested dir' => ['folder/subfolder/file.html', 'html'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox pass[$_dataName] => $arg_1 not has ext $arg_2.
     */
    public function throw(string $arg_1, string $arg_2): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        File_Assertion::of(filepath: $arg_1)->has_ext(ext: $arg_2);
    }

    public static function throw_data_provider(): iterable {
        yield 'basic' => ['file.php', 'txt'];

        yield 'no file ext' => ['php', 'php'];

        yield 'in dir' => ['folder/file.txt', 'html'];

        yield 'in nested dir' => ['folder/subfolder/file.html', 'php'];
    }
}
