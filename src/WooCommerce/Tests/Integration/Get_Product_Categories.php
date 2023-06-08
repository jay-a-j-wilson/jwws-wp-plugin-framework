<?php declare(strict_types=1);

namespace JWWS\WPPF\WooCommerce\Tests\Integration;

use JWWS\WPPF\WooCommerce\WooCommerce;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\WooCommerce\WooCommerce
 *
 * @internal
 */
final class Get_Product_Categories extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::expectNotToPerformAssertions();
        //WooCommerce::get_product_categories();
    }
}
