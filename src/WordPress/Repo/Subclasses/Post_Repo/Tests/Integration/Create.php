<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Post_Repo;

/**
 * @covers Post_Repo
 */
final class Create extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function output(): void {
        $this->expectNotToPerformAssertions();
        echo print_r(
            value: Post_Repo::create(),
            return: true,
        ) . PHP_EOL;
    }

    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: Post_Repo::class,
            actual: Post_Repo::create(),
        );
    }
}
