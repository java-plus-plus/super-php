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

class PlainText extends SuperPHPElement {
    public DOMNode $node;
    function __construct($text) {
        $this->node = self::$dom->createTextNode($text);
    }
}

class Comment extends SuperPHPElement {
    public DOMNode $node;
    function __construct(String $text) {
        $this->node = self::$dom->createComment($text);
    }
}

class AnchorLink extends SuperPHPElement {
    public DOMNode $node;

    /**
     * AnchorLink
     * 
     * The <a> tag defines a hyperlink, which is used to link from one page to another.
     * 
     * The most important attribute of the <a> element is the href attribute, which indicates the link's destination.
     * 
     * By default, links will appear as follows in all browsers:
     * 
     *  * An unvisited link is underlined and blue
     *  * A visited link is underlined and purple
     *  * An active link is underlined and red
     * 
     *   Attributes:
     * 
     * @param SuperPHPElement[] $children
     * @param String $download - filename
     * * Specifies that the target will be downloaded when a user clicks on the hyperlink
     * @param String $href - URL
     * * Specifies the URL of the page the link goes to
     * @param String $hreflang - language_code
     * * Specifies the language of the linked document
     * @param String $media - media_query
     * * Specifies what media/device the linked document is optimized for
     * @param String $ping - list_of_URLs
     * * Specifies a space-separated list of URLs to which, when the link is followed, post requests with the body ping will be sent by the browser (in the background). Typically used for tracking.
     * @param String $referrerpolicy
     *  - no-referrer
     *  - no-referrer-when-downgrade
     *  - origin
     *  - origin-when-cross-origin
     *  - same-origin
     *  - strict-origin-when-cross-origin
     *  - unsafe-url
     * * Specifies which referrer information to send with the link
     * @param String $rel
     *  - alternate
     *  - author
     *  - bookmark
     *  - external
     *  - help
     *  - license
     *  - next
     *  - nofollow
     *  - noreferrer
     *  - noopener
     *  - prev
     *  - search
     *  - tag
     * * Specifies the relationship between the current document and the linked document
     * @param String $target
     *  - _blank
     *  - _parent
     *  - _self
     *  - _top
     * * Specifies where to open the linked document
     * @param String $type
     * - media_type
     * * Specifies the media type of the linked document
     * 
     * * Global attributes:
     * accesskey	Specifies a shortcut key to activate/focus an element
     * @param String classes	Specifies one or more classnames for an element (refers to a class in a style sheet)
     * @param String contenteditable	Specifies whether the content of an element is editable or not
     * @param String dir	Specifies the text direction for the content in an element
     * @param String draggable	Specifies whether an element is draggable or not
     * @param String hidden	Specifies that an element is not yet, or is no longer, relevant
     * @param String id	Specifies a unique id for an element
     * @param String lang	Specifies the language of the element's content
     * @param String spellcheck	Specifies whether the element is to have its spelling and grammar checked or not
     * @param String style	Specifies an inline CSS style for an element
     * @param String tabindex	Specifies the tabbing order of an element
     * @param String title	Specifies extra information about an element
     * @param String translate	Specifies whether the content of an element should be translated or not
     */
    function __construct(
        SuperPHPElement $child = null,
        String $download = null,
        String $href = null,
        String $hreflang = null,
        String $media = null,
        String $ping = null,
        String $referrerpolicy = null,
        String $rel = null,
        String $target = null,
        String $type = null,

        // Global attributes
        String $accesskey = null,
        array $classes = null,
        String $contenteditable = null,
        String $dir = null,
        String $draggable = null,
        String $hidden = null,
        String $id = null,
        String $lang = null,
        String $spellcheck = null,
        String $style = null,
        String $tabindex = null,
        String $title = null,
        String $translate = null,
    ) {
        $this->node = self::$dom->createElement("a");
        if ($download) $this->node->setAttribute("download", $download);
        if ($href) $this->node->setAttribute("href", $href);
        if ($hreflang) $this->node->setAttribute("hreflang", $hreflang);
        if ($media) $this->node->setAttribute("media", $media);
        if ($ping) $this->node->setAttribute("ping", $ping);
        if ($referrerpolicy) $this->node->setAttribute("referrerpolicy", $referrerpolicy);
        if ($rel) $this->node->setAttribute("rel", $rel);
        if ($target) $this->node->setAttribute("target", $target);
        if ($type) $this->node->setAttribute("type", $type);

        // Global attributes
        if ($accesskey) $this->node->setAttribute("accesskey", $accesskey);
        if ($classes) $this->node->setAttribute("class", implode(" ", $classes));
        if ($contenteditable) $this->node->setAttribute("contenteditable", $contenteditable);
        if ($dir) $this->node->setAttribute("dir", $dir);
        if ($draggable) $this->node->setAttribute("draggable", $draggable);
        if ($hidden) $this->node->setAttribute("hidden", $hidden);
        if ($id) $this->node->setAttribute("id", $id);
        if ($lang) $this->node->setAttribute("lang", $lang);
        if ($spellcheck) $this->node->setAttribute("spellcheck", $spellcheck);
        if ($style) $this->node->setAttribute("style", $style);
        if ($tabindex) $this->node->setAttribute("tabindex", $tabindex);
        if ($title) $this->node->setAttribute("title", $title);
        if ($translate) $this->node->setAttribute("translate", $translate);

        if ($child)
            $this->node->appendChild($child->node);
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
