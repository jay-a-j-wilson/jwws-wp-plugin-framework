<?php

namespace JWWS\WPPF\Template_Engine;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 */
class File {
    /**
     */
    private static string $extension = '.html.php';

    /**
     * @param string $name
     *
     * @return self
     */
    public static function create(string $name): self {
        $filename = $name . self::$extension;

        if (file_exists(filename: $filename)) {
            return new self($filename);
        }

        throw new \Exception(message: "Template file “{$filename}” not found");
    }

    /**
     * @param string $name
     */
    private function __construct(private string $name) {
    }

    /**
     * Returns file's name.
     *
     * @return string
     */
    public function get_name(): string {
        return $this->name;
    }
}
