<?php
namespace PureIntento\PrintifySdk\Structures;


class Product extends Structure{
    protected array $requiredAttributes = [
        "id",
        "title",
        "description",
        "blueprint_id"
    ];
}