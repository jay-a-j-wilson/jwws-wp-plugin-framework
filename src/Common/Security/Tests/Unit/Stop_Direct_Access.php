<?php declare(strict_types=1);

namespace JWWS\WPPF\Common\Security\Tests\Unit;

use JWWS\WPPF\Common\Security\Security;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Common\Security\Security
 *
 * @internal
 *
 * @small
 */
final class Stop_Direct_Access extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        // \define(constant_name: 'ABSPATH', value: '/path/to/application');

        $this->expectNotToPerformAssertions();
        Security::stop_direct_access();
    }
}
