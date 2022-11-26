<?php

namespace JWWS\WP_Plugin_Framework\Loader;

class PHP_Version {
    /**
     * @param private string $min
     * @param private string $max
     */
    public function __construct(
        private string $min,
        private string $max,
    ) {
    }

    /**
     * Returns the minimum version.
     * 
     * @return string
     */
    public function get_min(): string {
        return $this->min;
    }

    /**
     * Returns the maxium version.
     *
     * @return string
     */
    public function get_max(): string {
        return $this->max;
    }
}
