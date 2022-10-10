<?php

use Material2\ContainedButton;
use Material2\Material2Icon;
use Material2\Material2Import;
use Material2\Material2Initialize;
use Material2\OutlinedButton;
use Material2\TextButton;
use SuperPHP\Abbr;
use SuperPHP\Body;
use SuperPHP\Div;
use SuperPHP\Head;
use SuperPHP\HTML;
use SuperPHP\SuperPHP;
use SuperPHP\PlainText;

require_once __DIR__ . "/../plugins/SimpleDB/config/SimpleDBConfig.php";
require_once __DIR__ . "/../plugins/SimpleDB/SimpleDB.php";
require_once __DIR__ . "/../src/SuperPHP.php";
require_once __DIR__ . "/../plugins/Material2/index.php";


// $db = new SimpleDB(
//     debug: true
// );


// print_r($myButton);
$spacer = new Div(style: "width: 200px; height: 20px;");

new SuperPHP(
    fn () => new HTML(
        children: [
            new Head(children: [
                new Material2Import(),
            ]),
            new Body(children: [
                new TextButton(
                    class: ["mdc-button"],
                    child: new PlainText("Click me!")
                ),
                $spacer,
                new OutlinedButton(
                    class: ["mdc-button"],
                    child: new PlainText("Click me!")
                ),
                $spacer,
                new ContainedButton(
                    class: ["mdc-button"],
                    child: new PlainText("Click me!"),
                    icon: new Material2Icon("favorite"),
                ),

                $spacer,
                new Abbr(
                    child: new PlainText("A single child"),
                    children: [
                        new PlainText("All its Children"),
                    ],
                    class: ["Test", "btn"]
                ),
                new Material2Initialize()
            ])
        ],
    ),
);

// echo (new SuperPHP(
//     fn () => new HTML(
//         child: new Button(
//             child: new PlainText("Go to Google"),
//         ),
//     ),
//     false
// ))->html;
