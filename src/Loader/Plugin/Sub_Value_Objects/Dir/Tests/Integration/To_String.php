<?php declare(strict_types=1);

namespace JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Tests\Integration;

use JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Dir;

/**
 * @cover \JWWS\WPPF\Loader\Plugin\Sub_Value_Objects\Dir\Dir
 */
final class To_String extends \WP_UnitTestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertStringEndsWith(
            suffix: '/wp-content/plugins/',
            string: Dir::create()->__toString(),
        );
    }
}