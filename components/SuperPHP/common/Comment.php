<?php

namespace SuperPHP;

use DOMNode;

class Comment extends SuperPHPElement {
    public DOMNode $node;
    function __construct(String $text) {
        parent::__construct();
        $this->node = self::$dom->createComment($text);
    }
}
