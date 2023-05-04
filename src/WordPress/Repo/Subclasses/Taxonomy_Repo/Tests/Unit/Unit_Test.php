<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Tests\Unit;

use JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo;
use PHPUnit\Framework\TestCase;

/**
 * @covers Taxonomy_Repo
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function output(): void {
        $this->expectNotToPerformAssertions();
        echo var_dump(value: Taxonomy_Repo::create());
    }

    /**
     * @test
     */
    public function pass(): void {
        $this->assertInstanceOf(
            expected: Taxonomy_Repo::class,
            actual: Taxonomy_Repo::create(),
        );
    }
}
