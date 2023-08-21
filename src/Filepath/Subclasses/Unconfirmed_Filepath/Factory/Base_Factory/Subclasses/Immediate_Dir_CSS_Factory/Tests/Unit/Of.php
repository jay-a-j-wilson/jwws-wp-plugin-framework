<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory\Subclasses\Immediate_Dir_CSS_Factory\Tests\Unit;

use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory\Subclasses\Immediate_Dir_CSS_Factory\Immediate_Dir_CSS_Factory;
use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory\Tests\Fixtures\Fixture;

/**
 * @covers \JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory\Subclasses\Immediate_Dir_CSS_Factory\Immediate_Dir_CSS_Factory
 *
 * @internal
 *
 * @small
 */
final class Of extends Fixture {
    /**
     * @test
     *
     * @dataProvider \JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Factory\Base_Factory\Tests\Data_Provider::files
     *
     * @testdox pass[$_dataName] => arg $arg exists.
     */
    public function pass(string $arg): void {
        self::assertInstanceOf(
            expected: Immediate_Dir_CSS_Factory::class,
            actual: Immediate_Dir_CSS_Factory::of(
                path: $this->full_path(path: $arg),
            ),
        );
    }
}
