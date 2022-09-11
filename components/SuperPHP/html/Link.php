<?php

namespace SuperPHP;

use DOMNode;

class Link extends SuperPHPElement {
     public DOMNode $node;

     /**
      * Link
      * 
      * The link element allows authors to link their document to other resources.
      *
      * @param SuperPHPElement|null $child
      * 
      * * Element-specific attributes:
      * @param String|null href	This attribute specifies the [URL](https://developer.mozilla.org/en-US/docs/Glossary/URL "URL: Uniform Resource Locator (URL) is a text string specifying where a resource can be found on the Internet.") of the linked resource. A URL can be absolute or relative.
      * @param String|null crossorigin	This enumerated attribute indicates whether [CORS](https://developer.mozilla.org/en-US/docs/Glossary/CORS "CORS: CORS (Cross-Origin Resource Sharing) is a system, consisting of transmitting HTTP headers, that determines whether browsers block frontend JavaScript code from accessing responses for cross-origin requests.") must be used when fetching the resource. [CORS-enabled images](https://developer.mozilla.org/en-US/docs/Web/HTML/CORS_Enabled_Image) can be reused in the [`<canvas>`](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/canvas "Use the HTML <canvas> element with either the canvas scripting API or the WebGL API to draw graphics and animations.") element without being _tainted_. The allowed values are:

`anonymous`

A cross-origin request (i.e. with an [`Origin`](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Origin "The Origin request header indicates where a fetch originates from. It doesn't include any path information, but only the server name. It is sent with CORS requests, as well as with POST requests. It is similar to the Referer header, but, unlike this header, it doesn't disclose the whole path.") HTTP header) is performed, but no credential is sent (i.e. no cookie, X.509 certificate, or HTTP Basic authentication). If the server does not give credentials to the origin site (by not setting the [`Access-Control-Allow-Origin`](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin "The Access-Control-Allow-Origin response header indicates whether the response can be shared with requesting code from the given origin.") HTTP header) the image will be tainted and its usage restricted.

`use-credentials`

A cross-origin request (i.e. with an `Origin` HTTP header) is performed along with a credential sent (i.e. a cookie, certificate, and/or HTTP Basic authentication is performed). If the server does not give credentials to the origin site (through [`Access-Control-Allow-Credentials`](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Credentials "The Access-Control-Allow-Credentials response header tells browsers whether to expose the response to frontend JavaScript code when the request's credentials mode (Request.credentials) is "include".") HTTP header), the resource will be _tainted_ and its usage restricted.

If the attribute is not present, the resource is fetched without a [CORS](https://developer.mozilla.org/en-US/docs/Glossary/CORS "CORS: CORS (Cross-Origin Resource Sharing) is a system, consisting of transmitting HTTP headers, that determines whether browsers block frontend JavaScript code from accessing responses for cross-origin requests.") request (i.e. without sending the `Origin` HTTP header), preventing its non-tainted usage. If invalid, it is handled as if the enumerated keyword **anonymous** was used. See [CORS settings attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/CORS_settings_attributes) for additional information.
      * @param String|null rel	This attribute names a relationship of the linked document to the current document. The attribute must be a space-separated list of the [link types values](https://developer.mozilla.org/en-US/docs/Web/HTML/Link_types).
      * @param String|null media	This attribute specifies the media that the linked resource applies to. Its value must be a media type / [media query](https://developer.mozilla.org/en-US/docs/Web/CSS/Media_queries). This attribute is mainly useful when linking to external stylesheets — it allows the user agent to pick the best adapted one for the device it runs on.

      **Notes:**

      *   In HTML 4, this can only be a simple white-space-separated list of media description literals, i.e., [media types and groups](https://developer.mozilla.org/en-US/docs/Web/CSS/@media), where defined and allowed as values for this attribute, such as `print`, `screen`, `aural`, `braille`. HTML5 extended this to any kind of [media queries](https://developer.mozilla.org/en-US/docs/Web/CSS/Media_queries), which are a superset of the allowed values of HTML 4.
      *   Browsers not supporting [CSS3 Media Queries](https://developer.mozilla.org/en-US/docs/Web/CSS/Media_queries) won't necessarily recognize the adequate link; do not forget to set fallback links, the restricted set of media queries defined in HTML 4.
      * @param String|null hreflang	This attribute indicates the language of the linked resource. It is purely advisory. Allowed values are determined by [BCP47](https://www.ietf.org/rfc/bcp/bcp47.txt). Use this attribute only if the [`href`](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#attr-href) attribute is present.
      * @param String|null type	This attribute is used to define the type of the content linked to. The value of the attribute should be a MIME type such as **text/html**, **text/css**, and so on. The common use of this attribute is to define the type of stylesheet being referenced (such as **text/css**), but given that CSS is the only stylesheet language used on the web, not only is it possible to omit the `type` attribute, but is actually now recommended practice. It is also used on `rel="preload"` link types, to make sure the browser only downloads file types that it supports.
      * @param String|null sizes	This attribute defines the sizes of the icons for visual media contained in the resource. It must be present only if the [`rel`](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link#attr-rel) contains a value of `icon` or a non-standard type such as Apple's `apple-touch-icon`. It may have the following values:

      *   `any`, meaning that the icon can be scaled to any size as it is in a vector format, like `image/svg+xml`.
      *   a white-space separated list of sizes, each in the format `_<width in pixels>_x_<height in pixels>_` or `_<width in pixels>_X_<height in pixels>_`. Each of these sizes must be contained in the resource.

      **Note:** Most icon formats are only able to store one single icon; therefore most of the time the [`sizes`](https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes#attr-sizes) contains only one entry. MS's ICO format does, as well as Apple's ICNS. ICO is more ubiquitous; you should definitely use it.
      * @param String|null as	undefined
      * @param String|null importance	undefined
      * @param String|null integrity	undefined
      * @param String|null referrerpolicy	undefined
      * @param String|null title	undefined
      * 
      * @author Jishnu Raj <jishnurajpp2@email.com>
      * @version 1.0.0 - 11 September 2022
      */
     function __construct(
          SuperPHPElement $child = null,

          // Element-specific attributes:
          String $href = null,
          String $crossorigin = null,
          String $rel = null,
          String $media = null,
          String $hreflang = null,
          String $type = null,
          String $sizes = null,
          String $as = null,
          String $importance = null,
          String $integrity = null,
          String $referrerpolicy = null,
          String $title = null,
     ) {
          $this->node = self::$dom->createElement("link");
          if ($child) $this->node->appendChild($child->node);

          // Element-specific attributes
          if ($href) $this->node->setAttribute("href", $href);
          if ($crossorigin) $this->node->setAttribute("crossorigin", $crossorigin);
          if ($rel) $this->node->setAttribute("rel", $rel);
          if ($media) $this->node->setAttribute("media", $media);
          if ($hreflang) $this->node->setAttribute("hreflang", $hreflang);
          if ($type) $this->node->setAttribute("type", $type);
          if ($sizes) $this->node->setAttribute("sizes", $sizes);
          if ($as) $this->node->setAttribute("as", $as);
          if ($importance) $this->node->setAttribute("importance", $importance);
          if ($integrity) $this->node->setAttribute("integrity", $integrity);
          if ($referrerpolicy) $this->node->setAttribute("referrerpolicy", $referrerpolicy);
          if ($title) $this->node->setAttribute("title", $title);
     }
}
