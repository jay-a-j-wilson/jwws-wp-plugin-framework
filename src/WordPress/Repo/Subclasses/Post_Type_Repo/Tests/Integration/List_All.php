<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Post_Type_Repo\Post_Type_Repo;

/**
 * @covers Post_Type_Repo
 */
final class List_All extends \WP_UnitTestCase {
    /**
     * @test
     */
    private function print(): void {
        echo print_r(
            value: Post_Type_Repo::create()
                ->list_all()
                ->pluck(key: 'name')
                ->implode(separator: PHP_EOL),
            return: true,
        ) . PHP_EOL;
    }

    /**
     * @test
     */
    public function pass(): void {
        $this->assertCount(
            expectedCount: 14,
            haystack: Post_Type_Repo::create()->list_all(),
        );
    }
}
