<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\WP_Taxonomy_Repo\Tests;

use JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\WP_Taxonomy_Repo\WP_Taxonomy_Repo;
use PHPUnit\Framework\TestCase;

/**
 * @cover WP_Taxonomy_Repo
 */
final class Unit_Test extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: WP_Taxonomy_Repo::class,
            actual: WP_Taxonomy_Repo::create(),
        );
    }

    /**
     * @test
     */
    public function output(): void {
        $this->expectNotToPerformAssertions();
        echo var_dump(value: WP_Taxonomy_Repo::create());
    }
}
