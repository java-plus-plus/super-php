<?php

namespace SuperPHP;

use DOMNode;

class Style extends SuperPHPElement {
     public DOMNode $node;

     /**
      * Style
      * 
      * The style element allows authors to embed style information in their documents. The style element is one of several inputs to the styling processing model. The element does not represent content for the user.
      *
      * @param SuperPHPElement|null $child
      * 
      * * Element-specific attributes:
      * @param String|null media	This attribute defines which media the style should be applied to. Its value is a [media query](https://developer.mozilla.org/en-US/docs/Web/Guide/CSS/Media_queries), which defaults to `all` if the attribute is missing.
      * @param String|null nonce	A cryptographic nonce (number used once) used to whitelist inline styles in a [style-src Content-Security-Policy](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src). The server must generate a unique nonce value each time it transmits a policy. It is critical to provide a nonce that cannot be guessed as bypassing a resource’s policy is otherwise trivial.
      * @param String|null type	This attribute defines the styling language as a MIME type (charset should not be specified). This attribute is optional and defaults to `text/css` if it is not specified — there is very little reason to include this in modern web documents.
      * @param String|null scoped	undefined
      * @param String|null title	undefined
      * 
      * @author Jishnu Raj <jishnurajpp2@email.com>
      * @version 1.0.0 - 11 September 2022
      */
     function __construct(
          SuperPHPElement $child = null,

          // Element-specific attributes:
          String $media = null,
          String $nonce = null,
          String $type = null,
          String $scoped = null,
          String $title = null,
     ) {
          $this->node = self::$dom->createElement("style");
          if ($child) $this->node->appendChild($child->node);

          // Element-specific attributes
          if ($media) $this->node->setAttribute("media", $media);
          if ($nonce) $this->node->setAttribute("nonce", $nonce);
          if ($type) $this->node->setAttribute("type", $type);
          if ($scoped) $this->node->setAttribute("scoped", $scoped);
          if ($title) $this->node->setAttribute("title", $title);
     }
}
