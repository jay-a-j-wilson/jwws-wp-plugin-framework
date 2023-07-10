<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Tests\Unit;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Post_Repo;

/**
 * @covers \JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Post_Repo
 *
 * @internal
 */
final class New_Instance extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Post_Repo::class,
            actual: Post_Repo::new_instance(),
        );
    }
}
