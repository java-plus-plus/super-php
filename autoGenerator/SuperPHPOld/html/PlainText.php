<?php

namespace SuperPHP;

use DOMNode;

class PlainText extends SuperPHPElement {
    public DOMNode $node;
    function __construct($text) {
        $this->node = self::$dom->createTextNode($text);
    }
}
