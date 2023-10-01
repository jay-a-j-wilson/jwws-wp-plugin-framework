<?php declare(strict_types=1);

namespace JWWS\WPPF\Template;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Filepath\Sub_Value_Objects\Dir\Base_Dir\Subclasses\Full_Dir\Full_Dir;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Base_File\Subclasses\PHP_File\Factory\PHP_File_Factory;
use JWWS\WPPF\Filepath\Subclasses\Confirmed_Filepath\Confirmed_Filepath;

// Security::stop_direct_access();

final class Template {
    /**
     * Factory method.
     */
    public static function of(string $path): self {
        return new self(
            filepath: Confirmed_Filepath::of(
                dir: Full_Dir::of(path: $path),
                file: PHP_File_Factory::of(path: $path)->create(),
            ),
        );
    }

    /**
     * @return void
     */
    private function __construct(
        private Confirmed_Filepath $filepath,
        private array $variables = [],
    ) {}

    /**
     * Assigns a value to a specific key in the template.
     */
    public function assign(string $key, mixed $value = ''): self {
        $this->variables[$key] = $value;

        return $this;
    }

    /**
     * Returns template to user.
     */
    public function output(): string {
        extract(array: $this->variables);

        ob_start();

        require $this->filepath->value;

        return trim(string: ob_get_clean());
    }
}
