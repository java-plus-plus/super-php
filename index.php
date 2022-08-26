<?php

use SuperPHP\SuperBody;
use SuperPHP\SuperButton;
use SuperPHP\SuperHead;
use SuperPHP\SuperHTML;
use SuperPHP\SuperLineBreak;
use SuperPHP\SuperPHP;
use SuperPHP\SuperText;
use SuperPHP\SuperTitle;

require_once __DIR__ . "/config/GlobalConfig.php";
require_once __DIR__ . "/components/SimpleDB.php";
require_once __DIR__ . "/components/head.php";
require_once __DIR__ . "/components/foot.php";
require_once __DIR__ . "/components/SuperPHP/SuperPHP.php";
require_once __DIR__ . "/components/MyCustomWidgetSample.php";


// $db = new SimpleDB(
//     debug: true
// );

$sPHP = new SuperPHP(
    fn () => new SuperHTML(
        children: [
            new SuperHead(
                children: [
                    new SuperTitle(
                        title: new SuperText(text: "Sample title",),
                    ),
                ],
            ),
            new MyCustomWidgetSample(),
            new SuperBody(
                children: [
                    new SuperText(text: "<h1>Kunjolee...!</h1>",),
                    new SuperButton(
                        children: [
                            new SuperText(text: "Click me!",)
                        ],
                    ),
                    new SuperLineBreak(count: 10),
                    new SuperButton(
                        children: [
                            new SuperText(text: "Or click here!",)
                        ],
                    ),
                ],
            ),
        ],
    ),
);


die();
?>
<html lang="en">
<?php
putHead(
    title: "Dashboard",
    db: $db,
    stylesheets: [
        ...GlobalConfig::default_stylesheets,
        "styles.css",
    ],
    scripts: []
);
?>

<body>


    <?php putFoot(
        db: null,
        scripts: [
            ...GlobalConfig::default_scripts
        ]
    ); ?>
</body>

</html>
</pre>