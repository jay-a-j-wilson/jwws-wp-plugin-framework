<?php declare(strict_types=1);

namespace JWWS\WPPF\Tests\PHPUnit\Extension\Hook;

use DG\BypassFinals;
use PHPUnit\Runner\BeforeTestHook;

final class Bypass_Finals_Hook implements BeforeTestHook {
    /**
     *  Mutates final classes into non final on-the-fly.
     */
    public function executeBeforeTest(string $test): void {
        BypassFinals::enable();
    }
}
