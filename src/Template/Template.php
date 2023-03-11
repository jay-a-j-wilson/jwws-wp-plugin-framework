<?php

namespace JWWS\WPPF\Template;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 */
final class Template {
    /**
     * Creates template.
     *
     * @param string $filename
     */
    public static function create(string $filename): self {
        return new self(
            file: Template_File::create(name: $filename),
        );
    }

    /**
     * Template constructor.
     *
     * @param File  $file
     * @param array $variables variables to embed in template
     */
    private function __construct(
        private Template_File $file,
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
     *
     * @return self
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
     *
     * @return self
     */
    public function append(string $name, mixed $value = ''): self {
        $this->variables[$name][] = $value;

        return $this;
    }

    /**
     * Returns template to user.
     *
     * @return string
     */
    public function output(): string {
        extract($this->variables);

        ob_start();

        require $this->file->get_name();

        return ob_get_clean();
    }
}
