<?php

namespace SuperPHP;

use DOMNode;

class Audio extends SuperPHPElement {
    public DOMNode $node;

    /**
     * Audio
     * 
     * The <audio> tag is used to embed sound content in a document, such as music or other audio streams.
     * 
     * The <audio> tag contains one or more <source> tags with different audio sources. The browser will choose the first source it supports.
     * 
     * The text between the <audio> and </audio> tags will only be displayed in browsers that do not support the <audio> element.
     * 
     * There are three supported audio formats in HTML: MP3, WAV, and OGG.
     *
     * @param SuperPHPElement|null $child
     * @param SuperPHPElement[]|null $children
     * 
     *  * Attributes:
     * @param String|null $autoplay	Specifies that the audio will start playing as soon as it is ready
     * @param String|null $controls	Specifies that audio controls should be displayed (such as a play/pause button etc)
     * @param String|null $loop	Specifies that the audio will start over again, every time it is finished
     * @param String|null $muted	Specifies that the audio output should be muted
     * @param String|null $preload	Specifies if and how the author thinks the audio should be loaded when the page loads
     *  - auto
     *  - metadata
     *  - none
     * @param String|null $src	Specifies the URL of the audio file
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
     * @author Jishnu Raj <jishnurajpp2@gmail.com>
     */
    function __construct(
        SuperPHPElement $child = null,

        // Attributes
        String $autoplay = null,
        String $controls = null,
        String $loop = null,
        String $muted = null,
        String $preload = null,
        String $src = null,

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

        parent::__construct();
        $this->node = self::$dom->createElement("audio");
        if ($child) $this->node->appendChild($child->node);
        if ($children) {
            foreach ($children as $child) {
                $this->node->appendChild($child->node);
            }
        }

        // Aattributes
        if ($autoplay) $this->node->setAttribute("autoplay", $autoplay);
        if ($controls) $this->node->setAttribute("controls", $controls);
        if ($loop) $this->node->setAttribute("loop", $loop);
        if ($muted) $this->node->setAttribute("muted", $muted);
        if ($preload) $this->node->setAttribute("preload", $preload);
        if ($src) $this->node->setAttribute("src", $src);

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
