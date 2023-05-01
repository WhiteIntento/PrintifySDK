<?php
namespace PureIntento\PrintifySdk;

class Catalog{
    
    protected PrintifyClient $client;

    public function __construct(PrintifyClient $client){
        $this->client=$client;
    }
    
    /**
     * Retrieve a specific blueprint
     */
    public function blueprint($id,$options = []) : Structures\Blueprint{
        $array=$this->client->request(APICatalogPath::blueprint($id), "GET", $options)->getArrayResponse();
        print_r($array);
        return new Structures\Blueprint($array);
    }

    /**
     * Retrieve a list of all available blueprints
     */

    public function blueprints($options = []) : StructureCollection{
        $array=$this->client->request(APICatalogPath::blueprints(), "GET", $options)->getArrayResponse();
        return new StructureCollection(Structures\Blueprint::class,$array);
    }
    /**
     * Retrieve a list of all print providers that fulfill orders for a specific blueprint
     */
    public function blueprintProviders($blueprintId,$options = []) : StructureCollection{
        $array=$this->client->request(APICatalogPath::blueprintProviders($blueprintId), "GET", $options)->getArrayResponse();
        return new StructureCollection(Structures\PrintProvider::class,$array);
    }
    
    /**
     * Retrieve a list of all variants of a blueprint from a specific print provider
     */
    public function blueprintProviderVariants($blueprintId, $printProviderId,$options = []) : StructureCollection{
        $array=$this->client->request(APICatalogPath::blueprintProviderVariants($blueprintId,$printProviderId), "GET", $options)->getArrayResponse();
        if(!array_key_exists("variants",$array)){
            throw new Exceptions\MissingRequiredAttribute("In api response the variants attribute is missing");
        }
        return new StructureCollection(Structures\blueprintProviderVariant::class,$array["variants"]);
    }

    /**
     * Retrieve the shipping information for all variants of a blueprint from a specific print provider
     */
    public function blueprintProviderShipping($blueprintId, $printProviderId,$options = []) : Structures\BlueprintProviderShipping{
        $array=$this->client->request(APICatalogPath::blueprintProviderShipping($blueprintId,$printProviderId), "GET", $options)->getArrayResponse();
        if(!array_key_exists("profiles",$array)){
            throw new Exceptions\MissingRequiredAttribute("In api response the profiles attribute is missing");
        }
        if(!array_key_exists("handling_time",$array)){
            throw new Exceptions\MissingRequiredAttribute("In api response the handling_time attribute is missing");
        }
        $array["profiles"]=new StructureCollection(Structures\ShippingProfile::class,$array["profiles"]);
        return new Structures\BlueprintProviderShipping($array);
    }


    /**
     * Retrieve a list of all available print-providers
     */
    public function printProviders($options=[]) : StructureCollection{
        $array=$this->client->request(APICatalogPath::printProviders(), "GET", $options)->getArrayResponse();
        return new StructureCollection(Structures\PrintProvider::class,$array);
    }

    /**
     * Retrieve a specific print-provider and a list of associated blueprint offerings
     */
    public function printProvider($id,$options=[]) : Structures\PrintProvider{
        $array=$this->client->request(APICatalogPath::printProvider($id), "GET", $options)->getArrayResponse();
        return new Structures\PrintProvider($array);
    }
}