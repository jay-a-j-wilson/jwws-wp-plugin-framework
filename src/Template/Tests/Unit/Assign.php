<?php declare(strict_types=1);

namespace JWWS\WPPF\Template\Tests;

use JWWS\WPPF\Template\Template;
use PHPUnit\Framework\TestCase;

/**
 * @cover Template
 */
final class Assign extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $this->expectOutputString(
            expectedString: Template::of(
                path: __DIR__ . '/templates/template.html.php',
            )
                ->assign(names: 'data', value: 'Variable')
                ->output(),
        );

        echo '<p>Test Template Variable</p>';
    }
}
