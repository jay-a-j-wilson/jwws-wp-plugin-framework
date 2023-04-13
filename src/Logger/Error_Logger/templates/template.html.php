<?= str_repeat(string: '=', times: $separator_length); ?>
<?= $newline_char; ?>
FILE: <?= $backtrace['file']; ?>
<?= $newline_char; ?>
LINE: <?= $backtrace['line']; ?>
<?= $newline_char; ?>
<?= str_repeat(string: '.', times: $separator_length); ?>
<?= $newline_char; ?>
<?= $newline_char; ?>
<?= $contents; ?>
<?= $newline_char; ?>
<?= str_repeat(string: '=', times: $separator_length); ?>
