<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\WP_Taxonomy_Repo\Tests;

use JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\WP_Taxonomy_Repo\WP_Taxonomy_Repo;

/**
 * @cover WP_Taxonomy_Repo
 */
final class Find_By_Name__Integration_Test extends \WP_UnitTestCase {
    /**
     * @test
     *
     * @testdox Valid taxonomy $name found.
     *
     * @testWith
     * ["category"]
     * ["post_tag"]
     * ["nav_menu"]
     * ["link_category"]
     */
    public function pass(string $name): void {
        $this->assertSame(
            expected: $name,
            actual: WP_Taxonomy_Repo::create()
                ->find_by_name(name: $name)
                ->name,
        );
    }

    /**
     * @test
     *
     * @testdox Invalid taxonomy $name not found.
     *
     * @testWith
     * ["invalid"]
     */
    public function throw(string $name): void {
        $this->expectException(exception: \InvalidArgumentException::class);
        WP_Taxonomy_Repo::create()->find_by_name(name: $name);
    }
}
