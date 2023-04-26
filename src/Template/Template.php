<?php declare(strict_types=1);

namespace JWWS\WPPF\Template;

use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Filepath\{
    Sub_Value_Objects\Directory\Subclasses\Entire_Directory\Entire_Directory,
    Sub_Value_Objects\File\Factory\Subclasses\PHP_Factory\PHP_Factory,
    Subclasses\Confirmed_Filepath\Confirmed_Filepath,
};

// Security::stop_direct_access();

/**
 * Undocumented class.
 */
final class Template {
    /**
     * Creates template.
     */
    public static function of(string $path): self {
        return new self(
            filepath: Confirmed_Filepath::of(
                directory: Entire_Directory::of(path: $path),
                file: PHP_Factory::of(path: $path),
            ),
        );
    }

    /**
     * Template constructor.
     *
     * @param array $variables variables to embed in template
     */
    private function __construct(
        private Confirmed_Filepath $filepath,
        private array $variables = [],
    ) {
    }

    /**
     * Assigns template variable(s).
     *
     * ? Investigate why $names accepts array type.
     *
     * @param string|array $names the template variable name(s)
     * @param mixed        $value the value to assign
     */
    public function assign(string|array $names, mixed $value = ''): self {
        if (is_array(value: $names)) {
            foreach ($names as $name => $val) {
                $this->{__FUNCTION__}($name, $val);
            }
        } else {
            $this->variables[$names] = $value;
        }

        return $this;
    }

    /**
     * Append an element to an assigned array.
     *
     * @param string $name  the template variable name
     * @param mixed  $value the value to assign
     */
    public function append(string $name, mixed $value = ''): self {
        $this->variables[$name][] = $value;

        return $this;
    }

    /**
     * Returns template to user.
     */
    public function output(): string {
        extract(array: $this->variables);

        ob_start();

        require $this->filepath->value;

        return ob_get_clean();
    }
}
