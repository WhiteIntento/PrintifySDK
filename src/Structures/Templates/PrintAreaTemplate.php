<?php
namespace PureIntento\PrintifySdk\Structures\Templates;

use PureIntento\PrintifySdk\Structures\Structure;

class PrintAreaTemplate extends Structure{

    protected array $requiredAttributes=[
        "variant_ids",
        "placeholders"=>[
            "position",
            "images"=>[
                "id",
                "x",
                "y",
                "scale",
                "angle"
            ]
        ]
    ];

    public function __construct(array $variantIds,?array $placeholders=null){
        $this->attributes["variant_ids"]=$variantIds;
        if(!is_null($placeholders)){
            $this->attributes["placeholders"]=$placeholders;
            parent::__construct($this->attributes);
        }
    }

    public function addPlaceholder(string $position, array $images){

        $imageAttributes=[];
        foreach($images as $value){
            $imageAttributes[]=$value->getAttributes();
        }
        $this->attributes["placeholders"][]=[
            "position" => $position,
            "images" => $imageAttributes
        ];
    }

}