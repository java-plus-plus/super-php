<?php

namespace Material2;

use SuperPHP\Fragment;
use SuperPHP\I;
use SuperPHP\Link;
use SuperPHP\PlainText;
use SuperPHP\Script;
use SuperPHP\SuperPHPElement;

class Material2Core extends SuperPHPElement {
    public static array $used_widgets = [
        "buttons" => false,
    ];
    function __construct() {
        parent::__construct();
    }
}

class Material2Import extends Material2Core {
    function __construct() {
        parent::__construct();
        $this->node = (new Fragment([
            new Link(
                href: "https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css",
                rel: "stylesheet"
            ),
            new Link(
                href: "https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css",
                rel: "stylesheet"
            ),
            new Link(
                rel: "stylesheet",
                href: "https://fonts.googleapis.com/icon?family=Material+Icons"
            ),
            new Script(
                src: "https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"
            )
        ]))->node;
    }
}

class Material2Initialize extends Material2Core {
    function __construct() {
        parent::__construct();
        $this->node = (new Script(
            new PlainText("mdc.autoInit();"),
        )
        )->node;
    }
}

class CustomAttr {
    function __construct(public string $name, public ?string $value = null) {
    }
}
class Material2Icon extends Material2Core {
    function __construct(public ?string $icon_name) {
        parent::__construct();
        $this->node = (new I(
            class: ["material-icons", "mdc-button__icon"],
            customAttributes: [new CustomAttr("aria-hidden", "true")],
            child: new PlainText($icon_name),
        )
        )->node;
    }
}
