<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\Tests\Unit;

use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\PHP_File;
use PHPUnit\Framework\TestCase;


/**
 * @covers \JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\PHP_File
 *
 * @internal
 */
final class Of extends TestCase {
    /**
     * @test
     */
    public function pass(): void {
        self::assertInstanceOf(
            expected: PHP_File::class,
            actual: PHP_File::of(path: 'path')
        );
    }

    /**
     * ! Write test for empty argument.
     */
}
