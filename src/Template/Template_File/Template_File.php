<?php

namespace JWWS\WPPF\Template\Template_File;

use JWWS\WPPF\Security\Security;

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
    public static function create_from(string $name): self {
        $filename = $name . self::$extension;

        if (file_exists(filename: $filename)) {
            return new self(name: $filename);
        }

        throw new \Exception(message: "Template file “{$filename}” not found");
    }

    /**
     */
    private static string $extension = '.html.php';

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
