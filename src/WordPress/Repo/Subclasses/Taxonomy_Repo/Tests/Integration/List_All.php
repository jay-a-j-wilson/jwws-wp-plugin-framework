<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Tests\Integration;

use JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo;

/**
 * @covers \JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo
 *
 * @internal
 */
final class List_All extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertCount(
            expectedCount: 7,
            haystack: Taxonomy_Repo::create()->list_all(),
        );
    }

    /**
     * @test
     */
    private function print(): void {
        echo print_r(
            value: Taxonomy_Repo::create()
                ->list_all()
                ->pluck(key: 'name')
                ->implode(separator: PHP_EOL),
            return: true,
        ) . PHP_EOL;
    }
}
