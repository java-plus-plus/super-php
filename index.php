<?php

use SuperPHP\Abbr;
use SuperPHP\Address;
use SuperPHP\AnchorLink;
use SuperPHP\Article;
use SuperPHP\Audio;
use SuperPHP\Body;
use SuperPHP\Button;
use SuperPHP\Comment;
use SuperPHP\Head;
use SuperPHP\HTML;
use SuperPHP\LineBreak;
use SuperPHP\SuperPHP;
use SuperPHP\PlainText;
use SuperPHP\Title;
use SuperPHP\Typography;

require_once __DIR__ . "/components/SimpleDB.php";
require_once __DIR__ . "/components/SuperPHP/SuperPHP.php";
require_once __DIR__ . "/components/MyCustomWidgetSample.php";


// $db = new SimpleDB(
//     debug: true
// );

new SuperPHP(
    fn () => new HTML(
        child: new Body(
            child: new PlainText("Go to Google"),
        ),
    ),
);
