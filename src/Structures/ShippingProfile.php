<?php
namespace PureIntento\PrintifySdk\Structures;

class ShippingProfile extends Structure{

    protected array $requiredAttributes = [
            "variant_ids",
            "first_item" => [
                "currency",
                "cost"
            ],
            "additional_items" => [
                "currency",
                "cost"
            ],
            "countries"
    ];

}