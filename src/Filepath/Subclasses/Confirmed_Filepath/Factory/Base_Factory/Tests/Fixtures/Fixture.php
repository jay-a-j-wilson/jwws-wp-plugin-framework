<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Factory\Base_Factory\Tests\Fixtures;

use PHPUnit\Framework\TestCase;

abstract class Fixture extends TestCase {
    protected function full_path(string $path): string {
        return __DIR__ . "/test_files/{$path}";
    }
}
