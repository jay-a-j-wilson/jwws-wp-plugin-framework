<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Tests\Unit;

use JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\WordPress\Repo\Subclasses\Taxonomy_Repo\Taxonomy_Repo
 *
 * @internal
 */
final class Create extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Taxonomy_Repo::class,
            actual: Taxonomy_Repo::create(),
        );
    }
}
