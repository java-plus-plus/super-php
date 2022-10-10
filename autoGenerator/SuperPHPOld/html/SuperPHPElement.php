<?php

namespace SuperPHP;

use DOMDocument;

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
