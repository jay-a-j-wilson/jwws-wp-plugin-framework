<?php declare(strict_types=1);

namespace JWWS\WPPF\Test\Traits;

trait Templateable {
    /**
     * Renders the template so it can be tested.
     */
    final static protected function template(
        string $file,
        array $data
    ): string {
        extract(array: $data);

        ob_start();

        include $file;

        return trim(string: ob_get_clean());
    }
}
