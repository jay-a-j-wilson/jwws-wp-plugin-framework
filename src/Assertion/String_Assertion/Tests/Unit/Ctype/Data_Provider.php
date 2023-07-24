<?php declare(strict_types=1);

namespace JWWS\WPPF\Assertion\String_Assertion\Tests\Unit\Ctype;

final class Data_Provider {
    /**
     * Values that should be considered empty.
     */
    public static function number_characters(): iterable {
        yield 'number' => ['0'];
    }

    /**
     * Values that should not be considered empty.
     */
    public static function special_characters(): iterable {
        yield 'whitespace' => [' '];

        yield 'acute' => ['~'];

        yield 'backtick' => ['`'];

        yield 'exclamation mark' => ['!'];

        yield 'question mark' => ['?'];

        yield 'at sign' => ['@'];

        yield 'hash' => ['#'];

        yield 'dollar_sign' => ['$'];

        yield 'percent sign' => ['%'];

        yield 'plus sign' => ['+'];

        yield 'equal sign' => ['='];

        yield 'circumflex' => ['^'];

        yield 'ampersand' => ['&'];

        yield 'asterisk' => ['*'];

        yield 'left parentheses' => ['('];

        yield 'left right' => [')'];

        yield 'left brace' => ['{'];

        yield 'right brace' => ['}'];

        yield 'left bracket' => ['['];

        yield 'right bracket' => [']'];

        yield 'left caret' => ['<'];

        yield 'right caret' => ['>'];

        yield 'hyphen' => ['-'];

        yield 'underscore' => ['_'];

        yield 'single quotation mark' => ['\''];

        yield 'double quotation mark' => ['"'];

        yield 'apostrophe' => ['’'];

        yield 'pipe' => ['|'];

        yield 'backslash' => ['\\'];

        yield 'slash' => ['/'];

        yield 'colon' => [':'];

        yield 'semicolon' => [';'];

        yield 'comma' => [';'];

        yield 'period' => ['.'];
    }
}
