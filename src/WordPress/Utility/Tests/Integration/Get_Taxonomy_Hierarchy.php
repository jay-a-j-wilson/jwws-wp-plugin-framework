<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Utility\Tests\Integration;

use JWWS\WPPF\WordPress\Utility\Tests\Integration\Fixtures\Fixture;
use JWWS\WPPF\WordPress\Utility\Utility;

/**
 * @covers \JWWS\WPPF\WordPress\Utility\Utility
 *
 * @internal
 *
 * @small
 */
final class Get_Taxonomy_Hierarchy extends Fixture {
    /**
     * @test
     */
    public function pass(): void {
        self::assertCount(
            expectedCount: 3,
            haystack: Utility::get_taxonomy_hierarchy(
                taxonomy: 'category',
            )[0]->children,
        );
    }
}
