const HTMLData = require("./HTMLData");
const fs = require("fs");
console.log(HTMLData.tags);


fs.writeFileSync("./output/SuperPHP.php", `<?php

namespace SuperPHP;

require_once __DIR__ . "./SuperPHPElement.php";
${HTMLData.tags.map(tag => `require_once __DIR__ . "./html/${pascalize(tag.name)}.php";`).join("\n")}


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
`);

HTMLData.tags.forEach(tag => {
    const tagName = pascalize(tag.name);
    const data = `<?php

namespace SuperPHP;

use DOMNode;

class ${tagName} extends SuperPHPElement {
    public DOMNode $node;

    /**
     * ${tagName}
     * 
     * ${tag.description.value}
     *
     * @param SuperPHPElement|null $child
     * 
     * * Element-specific attributes:
${tag.attributes.map(attr => `     * @param String|null ${camelize(attr.name)}\t${attr.description && attr.description.value}`).join("\n")}
* 
* * Global attributes:
${HTMLData.globalAttributes.map(attr => {
        console.log(attr);
        return `     * @param String|null ${camelize(attr.name)}\t${attr.description && attr.description.value}`
    }).join("\n")}
     * 
     * @author Jishnu Raj <jishnurajpp2@email.com>
    * @version 1.0.0 - 11 September 2022
     */
    function __construct(
        SuperPHPElement $child = null,

        // Element-specific attributes:
${tag.attributes.map(attr => `        String $${camelize(attr.name)} = null,`).join("\n")}

        // Global attributes
${HTMLData.globalAttributes.map(attr => `        String $${camelize(attr.name)} = null,`).join("\n")}
    ) {
        $this->node = self::$dom->createElement("${tag.name}");
        if ($child) $this->node->appendChild($child->node);

        // Element-specific attributes
${tag.attributes.map(attr => `        if ($${camelize(attr.name)}) $this->node->setAttribute("${attr.name}", $${camelize(attr.name)});`).join("\n")}

        // Global attributes
${HTMLData.globalAttributes.map(attr => `        if ($${camelize(attr.name)}) $this->node->setAttribute("${attr.name}", $${camelize(attr.name)});`).join("\n")}
    }
}
`;
    fs.writeFileSync(`./output/html/${tagName}.php`, data);
});

console.log("Generating SuperTags complete!")

function camelize(text) {
    text = text.replace(/[-_\s.]+(.)?/g, (_, c) => c ? c.toUpperCase() : '');
    return text.substring(0, 1).toLowerCase() + text.substring(1);
}

function pascalize(text) {
    return text.replace(/\w+/g,
        function (w) { return w[0].toUpperCase() + w.slice(1).toLowerCase(); });
}
