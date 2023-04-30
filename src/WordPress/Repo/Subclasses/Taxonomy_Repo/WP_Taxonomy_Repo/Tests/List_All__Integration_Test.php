<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\WP_Taxonomy_Repo\Tests;

use JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\WP_Taxonomy_Repo\WP_Taxonomy_Repo;

/**
 * @cover WP_Taxonomy_Repo
 */
final class List_All__Integration_Test extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function output(): void {
        $this->expectNotToPerformAssertions();
        echo print_r(
            value: WP_Taxonomy_Repo::create()
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
            expectedCount: 7,
            haystack: WP_Taxonomy_Repo::create()->list_all(),
        );
    }
}
