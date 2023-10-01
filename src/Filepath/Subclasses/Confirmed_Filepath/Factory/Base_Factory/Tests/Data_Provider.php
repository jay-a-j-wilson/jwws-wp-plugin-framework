<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory\Tests;

final class Data_Provider {
    /**
     * ! Check logic.
     */
    public static function files(): iterable {
        yield ['folder/file_1.php'];

        yield ['folder/file_1.css'];

        yield ['folder/file_1.txt'];

        yield ['file_1.txt'];

        yield ['file_2.txt'];

        yield ['file_1.css'];

        yield ['file_1'];
    }
}
