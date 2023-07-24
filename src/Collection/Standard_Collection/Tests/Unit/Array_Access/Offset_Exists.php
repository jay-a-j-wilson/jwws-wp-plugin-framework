<?php declare(strict_types=1);

namespace JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Array_Access;

use JWWS\WPPF\Collection\Collection;
use JWWS\WPPF\Collection\Standard_Collection\Tests\Unit\Fixtures\Collection_Factory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \JWWS\WPPF\Collection\Standard_Collection\Standard_Collection
 *
 * @internal
 *
 * @small
 */
final class Offset_Exists extends TestCase {
    private static Collection $sut;

    public static function setUpBeforeClass(): void {
        parent::setUpBeforeClass();

        self::$sut = Collection_Factory::create_and_get();
    }

    /**
     * @test
     *
     * @dataProvider pass_exists_data_provider
     *
     * @testdox pass_exists[$_dataName] => arg $arg
     */
    public function pass_exists(int $arg): void {
        self::assertTrue(
            condition: self::$sut->offsetExists(key: $arg),
        );
    }

    public static function pass_exists_data_provider(): iterable {
        yield [0];

        yield [1];

        yield [2];

        yield [3];

        yield [4];
    }

    /**
     * @test
     */
    public function pass_not_exists(): void {
        self::assertFalse(condition: self::$sut->offsetExists(key: 5));
    }
}
