<?php declare(strict_types=1);

namespace JWWS\WPPF\Template\Tests\Unit;

use JWWS\WPPF\Template\Template;
use PHPUnit\Framework\TestCase;

/**
 * @cover Template
 */
final class Of extends TestCase {
    /**
     * @test
     *
     * @testdox valid $path
     *
     * @dataProvider pass_data_provider
     */
    public function pass(string $path): void {
        $this->expectNotToPerformAssertions();
        Template::of(path: __DIR__ . "/templates/{$path}");
    }

    public function pass_data_provider(): array {
        return [
            ['template.html.php'],
        ];
    }

    /**
     * @test
     *
     * @testdox invalid $path
     *
     * @dataProvider throw_data_provider
     */
    public function throw(string $path): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Template::of(path: __DIR__ . "/templates/{$path}");
    }

    public function throw_data_provider(): array {
        return [
            ['invalid.html.php'],
            ['invalid.html'],
        ];
    }
}
