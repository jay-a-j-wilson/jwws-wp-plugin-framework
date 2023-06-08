<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\{
    Term_Repo,
    Tests\Integration\Fixtures\Fixture
};

/**
 * @covers JWWS\WPPF\WordPress\Repo\Subclasses\Term_Repo\Term_Repo
 */
final class List_All extends Fixture {
    /**
     * @test
     */
    public function pass(): void {
        $this->assertCount(
            expectedCount: 5,
            haystack: Term_Repo::create()->list_all(),
        );
    }
}
