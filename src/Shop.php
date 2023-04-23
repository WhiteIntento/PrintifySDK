<?php
namespace PureIntento\PrintifySdk;

class Shop{
    protected PrintifyClient $client;

    public function __construct(PrintifyClient $client){
        $this->client=$client;
    }

    public function shops($options=[]){
        $array=$this->client->request(APIShopPath::shops(),"GET",$options)->getArrayResponse();
        return new StructureCollection(Structures\Shop::class,$array,true);
    }

    public function deleteShop($shopId,$options = []): array{
        $array=$this->client->request(APIShopPath::deleteShop($shopId),'DELETE',$options)->getArrayResponse();
        return $array;
    }
}