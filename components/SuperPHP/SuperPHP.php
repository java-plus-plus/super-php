<?php

namespace SuperPHP;

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

abstract class SuperPHPElement {
    public static string $version = "1.0";
    public static string $encoding  = "UTF-8";
    public static DOMDocument $dom;

    function __construct() {
        if (!isset(self::$dom)) {
            self::$dom = new DOMDocument("1.0", "UTF-8");
        }
    }
}

class SuperText extends SuperPHPElement {
    public DOMNode $node;
    function __construct($text) {
        // var_dump(self::$dom);
        $this->node = self::$dom->createTextNode($text);
    }
}

class SuperHTML extends SuperPHPElement {
    public DOMNode $node;
    function __construct($children = []) {
        // var_dump(self::$dom);
        $this->node = self::$dom->createElement("html");
        foreach ($children as $child) {
            $this->node->appendChild($child->node);
        }
    }
}

class SuperHead extends SuperPHPElement {
    public DOMNode $node;
    function __construct($children = []) {
        $this->node = self::$dom->createElement("head");
        foreach ($children as $child) {
            $this->node->appendChild($child->node);
        }
    }
}

class SuperBody extends SuperPHPElement {
    public DOMNode $node;
    function __construct($children = []) {
        $this->node = self::$dom->createElement("body");
        foreach ($children as $child) {
            $this->node->appendChild($child->node);
        }
    }
}

class SuperTitle extends SuperPHPElement {
    public DOMNode $node;
    function __construct(SuperText $title) {
        $this->node = self::$dom->createElement("title");
        $this->node->appendChild($title->node);
    }
}

class SuperButton extends SuperPHPElement {
    public DOMNode $node;
    function __construct($children = []) {
        $this->node = self::$dom->createElement("button");
        foreach ($children as $child) {
            $this->node->appendChild($child->node);
        }
    }
}

class SuperLineBreak extends SuperPHPElement {
    public DOMNode $node;
    function __construct(int $count = 1) {
        $this->node = self::$dom->createDocumentFragment();
        for ($i = 0; $i < $count; $i++) {
            $this->node->appendChild(self::$dom->createElement("br"));
        }
    }
}
