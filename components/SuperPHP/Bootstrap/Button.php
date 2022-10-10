<?php

namespace Bootstrap;

use SuperPHP\SuperPHPElement;
use SuperPHP\Button as HtmlButton;

class Button extends SuperPHPElement {
    function __construct() {
        $this->node = (new HtmlButton(class: ["btn btn-primary"]))->node;
    }
}
