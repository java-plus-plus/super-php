<?php

use SuperPHP\AnchorLink;
use SuperPHP\Body;
use SuperPHP\Button;
use SuperPHP\Comment;
use SuperPHP\Head;
use SuperPHP\HTML;
use SuperPHP\LineBreak;
use SuperPHP\SuperPHP;
use SuperPHP\PlainText;
use SuperPHP\Title;

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
    fn () => new HTML(
        children: [
            new Head(
                children: [
                    new Title(
                        title: new PlainText(text: "Sample title",),
                    ),
                ],
            ),
            new MyCustomWidgetSample(),
            new Body(
                children: [
                    new AnchorLink(
                        new PlainText("Go to Google"),
                        href: "https://google.com",
                        download: "Oi.txt",
                        id: "123",
                        classes: ["btn", "btn-primary"]
                    ),
                    new LineBreak(count: 1),
                    new Comment("<h1>Hllo...!</h1>"),
                    new Button(
                        children: array_map(fn ($element) => new PlainText(text: "Click me!",), [1, 2, 3]),
                    ),
                    new LineBreak(count: 10),
                    new Button(
                        children: [
                            new PlainText(text: "Or click here!",)
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