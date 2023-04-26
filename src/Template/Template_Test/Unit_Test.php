<?php declare(strict_types=1);

namespace JWWS\WPPF\Template\Tests;

use JWWS\WPPF\Template\Template;
use PHPUnit\Framework\Attributes\{
    CoversClass,
    Test,
};
use PHPUnit\Framework\TestCase;

#[CoversClass(className: Template::class)]
final class Unit_Test extends TestCase {
    #[Test]
    public function pass_path(): void {
        $this->expectNotToPerformAssertions();
        Template::of(path: __DIR__ . '/templates/template.html.php');
    }

    #[Test]
    public function throw_path(): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        Template::of(path: __DIR__ . '/templates/invalid.html.php');
    }

    #[Test]
    public function pass_assign(): void {
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
