<?php function putFoot(SimpleDB $db = null, array $scripts = null) { ?>
    <footer>
        This is the footer
    </footer>
    <?php foreach ($scripts as $script) : ?>
        <script src="<?= $script ?>"></script>
    <?php endforeach; ?>
<?php } ?>