<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\WP_Post_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\WP_Post_Repo\WP_Post_Repo;

/**
 * @cover WP_Post_Repo
 */
final class Create extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: WP_Post_Repo::class,
            actual: WP_Post_Repo::create(),
        );
    }
}
