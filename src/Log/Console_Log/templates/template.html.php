<script>
    <?php if (! empty($message)):  ?>
        console.log('<?= $message; ?>');
    <?php endif; ?>

    console.log(<?= $backtrace; ?>);
    console.log(<?= $output; ?>);
    console.log('');
</script>