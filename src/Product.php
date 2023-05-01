<?php
namespace PureIntento\PrintifySdk;

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

  
}