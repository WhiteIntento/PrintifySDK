<?php
namespace PureIntento\PrintifySdk;

use PureIntento\PrintifySdk\Structures\Templates\ProductCreationTemplate;

class Product{
    
    protected PrintifyClient $client;

    public function __construct(PrintifyClient $client){
        $this->client=$client;
    }

    /**
     * Retrive a list of products
     * @param int $shopId
     * @param array $options
     * @return StructureCollection
     */
    public function products($shopId,$options = []) : StructureCollection{
        $array=$this->client->request(APIProductPath::products($shopId), "GET", $options)->getArrayResponse();
        return new StructureCollection(Structures\Product::class,$array);
    }

    /**
     * Retrive a specific product
     * @param $shopId
     * @param $productId
     * @return Product
     */
    public function product($shopId,$productId,$options = []) : Structures\Product{
        $array=$this->client->request(APIProductPath::product($shopId,$productId), "GET", $options)->getArrayResponse();
        return new Structures\Product($array);
    }


    public function createProduct($shopId, ProductCreationTemplate | array $productCreationTemplate, $options = []) : array {
        if(is_array($productCreationTemplate)){
            $options["json"]=$productCreationTemplate;
        } else {
            $options["json"]=$productCreationTemplate->getAttributes();
        }
        $array=$this->client->request(APIProductPath::createProduct($shopId), "POST", $options)->getArrayResponse();
        return $array;
    }

  
}