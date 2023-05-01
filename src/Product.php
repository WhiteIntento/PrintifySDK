<?php
namespace PureIntento\PrintifySdk;

class Product{
    
    protected PrintifyClient $client;

    public function __construct(PrintifyClient $client){
        $this->client=$client;
    }
    
    /**
     * Retrieve a specific blueprint
     */
    public function blueprint($id,$options = []) : Structures\Blueprint{
        $array=$this->client->request(APIPath::blueprint($id), "GET", $options)->getArrayResponse();
        return new Structures\Blueprint($array);
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
  
}