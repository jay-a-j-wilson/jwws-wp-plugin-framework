<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name\Collabs\Path_Info;

use InvalidArgumentException;
use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;

// Security::stop_direct_access();

final class Path_Info {
    /**
     * @throws InvalidArgumentException
     */
    public static function of(string $path): self {
        String_Assertion::of(string: $path)->is_not_empty();
        // Assertion::of(value: $path)->valid_chars();

        return new self(
            path_info: pathinfo(path: $path),
        );
    }

    /**
     * @return void
     */
    private function __construct(private readonly array $path_info) {}

    public function all(): array {
        return $this->path_info;
    }

    public function dirname(): string {
        return $this->path_info['dirname'];
    }

    public function basename(): string {
        return $this->path_info['basename'];
    }

    public function extension(): string {
        return $this->path_info['extension'];
    }

    /**
     * @throws InvalidArgumentException
     */
    public function validated_filename(): string {
        $filename = $this->filename();

        String_Assertion::of(string: $filename)
            ->is_not_empty(message: 'Filename cannot be empty.')
        ;

        return $filename;
    }

    public function filename(): string {
        return $this->path_info['filename'];
    }
}
