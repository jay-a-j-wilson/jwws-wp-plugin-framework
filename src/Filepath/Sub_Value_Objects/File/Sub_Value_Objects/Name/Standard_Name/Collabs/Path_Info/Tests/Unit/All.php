<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Collabs\Path_Info\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Collabs\Path_Info\Path_Info;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Collabs\Path_Info\Path_Info
 *
 * @internal
 *
 * @small
 */
final class All extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertSame(
            expected: [
                'dirname'   => 'dir',
                'basename'  => 'file.ext',
                'extension' => 'ext',
                'filename'  => 'file',
            ],
            actual: Path_Info::of(path: 'dir/file.ext')->all(),
        );
    }
}
