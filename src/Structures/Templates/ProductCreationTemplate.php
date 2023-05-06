<?php
namespace PureIntento\PrintifySdk\Structures\Templates;

use PureIntento\PrintifySdk\Structures\Structure;

/**
 * This class takes care of the data that is sent to create a product in printify
 * Този class се грижи за данните които се подават за създаване продукт в printify
 */
class ProductCreationTemplate extends Structure{

    protected $requiredAttrubutes=[
        "title",
        "description",
        "blueprint_id",
        "print_provider_id",
        "variants"=>[
            "id",
            "is_enabled",
            "price",
        ]
    ];

    public function __construct($title,$description,$blueprintId,$printProviderId){
        $this->attributes=[
            "title"=>$title,
            "description"=>$description,
            "blueprint_id"=>$blueprintId,
            "print_provider_id"=>$printProviderId,
            "print_areas"=>[]
        ];
    }

    /**
     * Този метод добавя вариянт на дадения чертеж както и цената на текущия вариянт и статус за активация.
     * This method adds a variant to the given drawing as well as the current variants, price and activation status.
     */

    public function addVariant($id,$price,$isEnabled=true) : void{
        $this->attributes["variants"][]=[
            "id"=>$id,
            "price"=>$price,
            "is_enabled"=>$isEnabled
        ];
    }

    public function addPrintArea(PrintAreaTemplate $pat){
        $this->attributes["print_areas"][]=$pat->getAttributes();
    }

}