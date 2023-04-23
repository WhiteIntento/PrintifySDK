<?php
namespace PureIntento\PrintifySdk;

class Catalog{
    
    protected PrintifyClient $client;

    public function __construct(PrintifyClient $client){
        $this->client=$client;
    }
    
    public function blueprint($id,$options = []) : Structures\Blueprint{
        $array=$this->client->request(APIPath::blueprint($id), "GET", $options)->getArrayResponse();
        return new Structures\Blueprint($array);
    }

    public function blueprints($options = []) : StructureCollection{
        $array=$this->client->request(APIPath::blueprints(), "GET", $options)->getArrayResponse();
        return new StructureCollection(Structures\Blueprint::class,$array);
    }

    public function blueprintProviders($blueprintId,$options = []) : StructureCollection{
        $array=$this->client->request(APIPath::blueprintProviders($blueprintId), "GET", $options)->getArrayResponse();
        return new StructureCollection(Structures\PrintProvider::class,$array);
    }

    public function blueprintProviderVariants($blueprintId, $printProviderId,$options = []) : StructureCollection{
        $array=$this->client->request(APIPath::blueprintProviderVariants($blueprintId,$printProviderId), "GET", $options)->getArrayResponse();
        if(!array_key_exists("variants",$array)){
            throw new Exceptions\MissingRequiredAttribute("In api response the variants attribute is missing");
        }
        return new StructureCollection(Structures\blueprintProviderVariant::class,$array["variants"]);
    }

    public function blueprintProviderShipping($blueprintId, $printProviderId,$options = []) : Structures\BlueprintProviderShipping{
        $array=$this->client->request(APIPath::blueprintProviderShipping($blueprintId,$printProviderId), "GET", $options)->getArrayResponse();
        if(!array_key_exists("profiles",$array)){
            throw new Exceptions\MissingRequiredAttribute("In api response the profiles attribute is missing");
        }
        if(!array_key_exists("handling_time",$array)){
            throw new Exceptions\MissingRequiredAttribute("In api response the handling_time attribute is missing");
        }
        $array["profiles"]=new StructureCollection(Structures\ShippingProfile::class,$array["profiles"]);
        return new Structures\BlueprintProviderShipping($array);
    }

    public function printProviders($options=[]) : StructureCollection{
        $array=$this->client->request(APIPath::printProviders(), "GET", $options)->getArrayResponse();
        return new StructureCollection(Structures\PrintProvider::class,$array);
    }

    public function printProvider($id,$options=[]) : Structures\PrintProvider{
        $array=$this->client->request(APIPath::printProvider($id), "GET", $options)->getArrayResponse();
        return new Structures\PrintProvider($array);
    }
}