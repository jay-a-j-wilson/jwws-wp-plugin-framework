<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Standard_Plugin\Subclasses\Standard_Plugin\Tests\Integration\Dependencies;

use JWWS\WPPF\Loader\{
    Plugin\Plugin,
    Tests\Integration\Fixtures\Akismet_Plugin,
    Tests\Integration\Fixtures\Basic_Plugin,
};

/**
 * @covers \JWWS\WPPF\Loader\Plugin\Standard_Plugin\Standard_Plugin
 *
 * @internal
 */
final class Dependencies extends \WP_UnitTestCase {
    protected Plugin $dependency;

    protected function setUp(): void {
        parent::setUp();

        $this->dependency = Akismet_Plugin::create_and_get();
    }

    /**
     * @test
     */
    public function pass(): void {
        self::assertEquals(
            expected: [$this->dependency],
            actual: Basic_Plugin::create_and_get()
                ->add_dependencies(plugins: $this->dependency)
                ->dependencies()
                ->to_array(),
        );
    }
}
