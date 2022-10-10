<?php

namespace SuperPHP;

use DOMNode;
use SuperPHP\SuperPHPElement;

class Fragment extends SuperPHPElement {
    public DOMNode $node;
    function __construct(array $children) {
        $this->node = self::$dom->createDocumentFragment();
        foreach ($children as $child) {
            $this->node->appendChild($child->node);
        }
    }
}
