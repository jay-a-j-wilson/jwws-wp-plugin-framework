<?php declare(strict_types=1);

namespace JWWS\WPPF\Template\Tests\Unit;

use JWWS\WPPF\Template\Template;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Template\Template
 *
 * @internal
 */
final class Of extends TestCase {
    /**
     * @test
     *
     * @dataProvider pass_data_provider
     *
     * @testdox pass[$_dataName] => $path
     */
    public function pass(string $arg): void {
        self::expectNotToPerformAssertions();
        Template::of(path: __DIR__ . "/templates/{$arg}");
    }

    public static function pass_data_provider(): iterable {
        yield ['template.html.php'];
    }

    /**
     * @test
     *
     * @dataProvider throw_data_provider
     *
     * @testdox throw[$_dataName] => $arg
     */
    public function throw(string $arg): void {
        self::expectException(exception: \InvalidArgumentException::class);
        Template::of(path: __DIR__ . "/templates/{$arg}");
    }

    public static function throw_data_provider(): iterable {
        yield 'missing file' => ['file.html.php'];

        yield 'missing php extension' => ['template.html'];
    }
}
