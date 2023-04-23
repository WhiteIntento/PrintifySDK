<?php
namespace PureIntento\PrintifySdk\Structures;


class Blueprint extends Structure{

    protected array $requiredAttributes = [
        "id",
        "title",
        "description",
        "brand",
        "model",
        "images"
    ];
    
}