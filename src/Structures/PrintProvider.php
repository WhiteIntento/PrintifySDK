<?php
namespace PureIntento\PrintifySdk\Structures;

class PrintProvider extends Structure{

    protected array $requiredAttributes = [
        "id",
        "title",
        "location" => [
            "address1",
            "city",
            "country",
            "region",
            "zip"
        ]
    ];

}