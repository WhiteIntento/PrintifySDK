<?php
namespace PureIntento\PrintifySdk\Structures;

class BlueprintProviderShipping extends Structure{

    protected array $requiredAttributes = [
        "handling_time" => [
            "value",
            "unit"
        ],
    ];

}