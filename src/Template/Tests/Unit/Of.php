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
     */
    public function pass(): void {
        $this->expectNotToPerformAssertions();
        Template::of(path: __DIR__ . '/templates/template.html.php');
    }

    /**
     * @test
     */
    public function throw(): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Template::of(path: __DIR__ . '/templates/invalid.html.php');
    }
}
