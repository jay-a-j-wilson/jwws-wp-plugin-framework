<?php

namespace JWWS\WPPF\Template_Engine;

if (! defined(constant_name: 'ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Template {
    /**
     */
    private const EXT = '.html.php';

    /**
     * Template file.
     *
     * @var string
     */
    private string $file;

    /**
     * Variables to embed in template.
     *
     * @var array
     */
    private array $variables = [];

    /**
     * Template constructor.
     *
     * @param string $filename
     */
    public function __construct(private string $filename) {
        $this->filename = $filename . self::EXT;
        $this->file     = $this->check_exists(file: $this->filename);
    }

    /**
     * @param string $file
     *
     * @throws Exception
     *
     * @return string
     */
    private function check_exists(string $file): string {
        if (file_exists(filename: $file)) {
            return $file;
        }

        throw new \Exception(
            message: "Template file “{$this->filename}” not found",
        );
    }

    /**
     * Assigns template variable(s).
     *
     * @param string|array $names the template variable name(s)
     * @param mixed        $value the value to assign
     *
     * @return self
     */
    public function assign(string|array $names, mixed $value = null): self {
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
    public function append(string $name, mixed $value = null): self {
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

        require $this->file;

        return ob_get_clean();
    }
}