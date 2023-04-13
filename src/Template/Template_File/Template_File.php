<?php

namespace JWWS\WPPF\Template\Template_File;

use JWWS\WPPF\Common\Security\Security;

Security::stop_direct_access();

/**
 */
final class Template_File {
    /**
     * @param string $name
     *
     * @throws \Exception
     *
     * @return Template_File
     */
    public static function of(string $name): self {
        return new self(
            name: self::validate(filename: "{$name}.html.php"),
        );
    }

    /**
     * @param string $filename
     *
     * @return string
     */
    public static function validate(string $filename): string {
        if (! file_exists(filename: $filename)) {
            throw new \Exception(
                message: "Template file “{$filename}” not found",
            );
        }

        return $filename;
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
