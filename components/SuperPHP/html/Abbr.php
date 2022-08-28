<?php

namespace SuperPHP;

use DOMNode;

class Abbr extends SuperPHPElement {
    public DOMNode $node;

    /**
     * Abbr
     * 
     * The <abbr> tag defines an abbreviation or an acronym, like "HTML", "CSS", "Mr.", "Dr.", "ASAP", "ATM".
     * Tip: Use the global title attribute to show the description for the abbreviation/acronym when you mouse over the element.
     *
     * @param SuperPHPElement|null $child
     * 
     * * Global attributes:
     * @param String|null $accesskey	Specifies a shortcut key to activate/focus an element
     * @param array|null $classes	Specifies one or more classnames for an element (refers to a class in a style sheet)
     * @param String|null $contenteditable	Specifies whether the content of an element is editable or not
     * @param String|null $dir	Specifies the text direction for the content in an element
     * @param String|null $draggable	Specifies whether an element is draggable or not
     * @param String|null $hidden	Specifies that an element is not yet, or is no longer, relevant
     * @param String|null $id	Specifies a unique id for an element
     * @param String|null $lang	Specifies the language of the element's content
     * @param String|null $spellcheck	Specifies whether the element is to have its spelling and grammar checked or not
     * @param String|null $style	Specifies an inline CSS style for an element
     * @param String|null $tabindex	Specifies the tabbing order of an element
     * @param String|null $title	Specifies extra information about an element
     * @param String|null $translate	Specifies whether the content of an element should be translated or not
     * 
     * @author Muhammed Nafih <muhammednafih09@email.com>
     */
    function __construct(
        SuperPHPElement $child = null,

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
        $this->node = self::$dom->createElement("abbr");
        if ($child) $this->node->appendChild($child->node);

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
    }
}
