<?php
require_once __DIR__ . "/SimpleDB.php";
function putHead(string $title, SimpleDB $db, array $stylesheets = null, array $scripts = null) { ?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php foreach ($stylesheets as $stylesheet) : ?>
            <link rel="stylesheet" href="<?= $stylesheet ?>">
        <?php endforeach; ?>
        <?php foreach ($scripts as $script) : ?>
            <script src="<?= $script ?>"></script>
        <?php endforeach; ?>
        <title><?= $title ?> </title>
    </head>
<?php } ?>