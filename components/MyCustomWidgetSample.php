<?php

use SuperPHP\SuperButton;
use SuperPHP\SuperPHPElement;
use SuperPHP\SuperText;

class MyCustomWidgetSample extends SuperPHPElement {
    public DOMNode $node;
    function __construct() {
        $this->node = (new SuperButton(
            [new SuperText("Oii"),]
        )
        )->node;
    }
}
