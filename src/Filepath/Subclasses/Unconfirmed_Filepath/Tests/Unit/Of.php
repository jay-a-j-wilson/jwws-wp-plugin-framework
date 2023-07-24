<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Dir;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\File;
use JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Subclasses\Unconfirmed_Filepath\Unconfirmed_Filepath
 *
 * @internal
 *
 * @small
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: Unconfirmed_Filepath::class,
            actual: Unconfirmed_Filepath::of(
                dir: self::createStub(originalClassName: Dir::class),
                file: self::createStub(originalClassName: File::class),
            ),
        );
    }
}
