<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\{
    Post_Repo,
    Tests\Integration\Fixtures\Fixture
};

/**
 * @covers \JWWS\WPPF\WordPress\Repo\Subclasses\Post_Repo\Post_Repo
 *
 * @internal
 */
final class List_All extends Fixture {
    /**
     * @test
     */
    public function pass(): void {
        $this->assertCount(
            expectedCount: 5,
            haystack: Post_Repo::new_instance()->list_all(),
        );
    }
}
