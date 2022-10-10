<?php

namespace SuperPHP;

use DOMNode;

class PlainText extends SuperPHPElement {
    public DOMNode $node;
    function __construct($text) {
        parent::__construct();
        $this->node = self::$dom->createTextNode($text);
    }
}
