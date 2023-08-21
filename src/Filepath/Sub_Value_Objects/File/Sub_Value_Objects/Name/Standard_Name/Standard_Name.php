<?php declare(strict_types=1);

namespace JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Standard_Name;

use InvalidArgumentException;
use JWWS\WPPF\Assertion\String_Assertion\String_Assertion;
use JWWS\WPPF\Common\Security\Security;
use JWWS\WPPF\Common\Value_Object\Base_Value_Object\Base_Value_Object;
use JWWS\WPPF\Filepath\Sub_Value_Objects\File\Sub_Value_Objects\Name\Name;

// Security::stop_direct_access();

final class Standard_Name extends Base_Value_Object implements Name {
    public static function of(string $path): self {
        String_Assertion::of(string: $path)->is_not_empty();
        // Assertion::of(value: $path)->valid_chars();

        return new self(
            value: self::validate(
                filename: self::filename(path: $path),
            ),
        );
    }

    private static function filename(string $path): string {
        return pathinfo(path: $path, flags: PATHINFO_FILENAME);
    }

    /**
     * @throws InvalidArgumentException if blank
     */
    private static function validate(string $filename): string {
        String_Assertion::of(string: $filename)
            ->is_not_empty(message: 'Filename cannot be empty.')
        ;

        return $filename;
    }
}
