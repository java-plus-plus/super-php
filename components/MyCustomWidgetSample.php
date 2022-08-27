<?php

use SuperPHP\Button;
use SuperPHP\SuperPHPElement;
use SuperPHP\PlainText;

class MyCustomWidgetSample extends SuperPHPElement {
    public DOMNode $node;
    function __construct() {
        $this->node = (new Button(
            [new PlainText("Oii"),]
        )
        )->node;
    }
}
