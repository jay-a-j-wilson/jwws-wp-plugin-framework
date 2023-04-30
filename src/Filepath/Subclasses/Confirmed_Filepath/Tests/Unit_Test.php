<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Tests;

use JWWS\WPPF\Filepath\{
    Sub_Value_Objects\Directory\Subclasses\Entire_Directory\Entire_Directory,
    Sub_Value_Objects\Directory\Subclasses\Immediate_Directory\Immediate_Directory,
    Sub_Value_Objects\File\Factory\Subclasses\PHP_Factory\PHP_Factory,
    Subclasses\Confirmed_Filepath\Confirmed_Filepath
};
use PHPUnit\Framework\Attributes\{
    CoversClass,
    DataProvider,
    Test,
    TestDox,
    TestWith
};
use PHPUnit\Framework\TestCase;

/**
 * @cover Confirmed_Filepath
 */
final class Unit_Test extends TestCase {
    public static function data_provider(): array {
        return [
            ['/Users/jaywilson/Sites/dev.xgamingsystems.com/wp-admin/index.php'],
            ['/Users/jaywilson/Sites/dev.xgamingsystems.com/wp-content/index.php'],
        ];
    }

    // #[Test]
    // #[TestDox(text: 'Valid path "$path" exists.')]
    // #[DataProvider(methodName: 'data_provider')]
    
    /**
     * @test
     *
     * @testdox Valid path "$path" exists.
     *
     * @dataProvider data_provider
     */
    public function pass(string $path): void {
        $this->expectNotToPerformAssertions();
        Confirmed_Filepath::of(
            directory: Entire_Directory::of(path: $path),
            file: PHP_Factory::of(path: $path),
        );
    }

    #[Test]
    #[TestDox(text: 'Valid path "$path" exists.')]
    #[DataProvider(methodName: 'data_provider')]
    public function pass_2(string $path): void {
        $this->expectNotToPerformAssertions();
        Confirmed_Filepath::of(
            directory: Immediate_Directory::of(path: $path),
            file: PHP_Factory::of(path: $path),
        );
    }
}
