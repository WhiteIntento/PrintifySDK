<?php
namespace PureIntento\PrintifySdk\Structures;


class Shop extends Structure{

    protected array $requiredAttributes = [
        "id",
        "title",
        "sales_channel"
    ];
    
}