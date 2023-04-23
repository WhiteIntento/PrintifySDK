<?php
namespace PureIntento\PrintifySdk\Structures;

class BlueprintProviderVariant extends Structure{

    protected array $requiredAttributes = [
        "id",
        "title",
        "options" => [
            "color",
            "size",
        ],
        "placeholders" => [
            "position",
            "height",
            "width"
        ]
    ];

}