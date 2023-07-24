<?php declare(strict_types=1);

namespace JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Tests\Integration;

use JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta;

/**
 * @covers \JWWS\WPPF\WordPress\Meta\Subclasses\Post_Meta\Post_Meta
 *
 * @internal
 *
 * @small
 */
final class Find_By_Key extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        add_post_meta(
            post_id: 1,
            meta_key: 'key',
            meta_value: 'value',
        );

        self::assertSame(
            expected: 'value',
            actual: Post_Meta::of(id: 1)
                ->find_by_key(key: 'key'),
        );
    }
}
