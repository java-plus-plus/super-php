<?php

namespace SuperPHP;

require_once __DIR__ . "./html/SuperPHPElement.php";
require_once __DIR__ . "./html/Comment.php";
require_once __DIR__ . "./html/PlainText.php";
require_once __DIR__ . "./html/Address.php";
require_once __DIR__ . "./html/AnchorLink.php";
require_once __DIR__ . "./html/Abbr.php";


use DOMDocument;
use DOMNode;

class SuperPHP extends SuperPHPElement {
    function __construct($cb) {
        parent::__construct();
        $output = $cb();
        self::$dom->appendChild($output->node);
        self::$dom->preserveWhiteSpace = false;
        self::$dom->formatOutput = true;
        echo self::$dom->saveHTML();
    }
}

class HTML extends SuperPHPElement {
    public DOMNode $node;
    function __construct(
        $children = []
    ) {
        $this->node = self::$dom->createElement("html");
        foreach ($children as $child) {
            $this->node->appendChild($child->node);
        }
    }
}

class Head extends SuperPHPElement {
    public DOMNode $node;
    function __construct($children = []) {
        $this->node = self::$dom->createElement("head");
        foreach ($children as $child) {
            $this->node->appendChild($child->node);
        }
    }
}

class Body extends SuperPHPElement {
    public DOMNode $node;
    function __construct($children = []) {
        $this->node = self::$dom->createElement("body");
        foreach ($children as $child) {
            $this->node->appendChild($child->node);
        }
    }
}

class Title extends SuperPHPElement {
    public DOMNode $node;
    function __construct(PlainText $title) {
        $this->node = self::$dom->createElement("title");
        $this->node->appendChild($title->node);
    }
}

class Button extends SuperPHPElement {
    public DOMNode $node;
    function __construct($children = []) {
        $this->node = self::$dom->createElement("button");
        foreach ($children as $child) {
            $this->node->appendChild($child->node);
        }
    }
}

class LineBreak extends SuperPHPElement {
    public DOMNode $node;
    function __construct(int $count = 1) {
        $this->node = self::$dom->createDocumentFragment();
        for ($i = 0; $i < $count; $i++) {
            $this->node->appendChild(self::$dom->createElement("br"));
        }
    }
}
