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

    /**
     * Този метод създава продукт в printify
     * This method creates a product in printify
     * @param int $shopId
     * @param PureIntento\PrintifySdk\Structures\Templates\ProductCreationTemplate $productCreationTemplate
     * @return array
     */
    public function createProduct($shopId, ProductCreationTemplate | array $productCreationTemplate, $options = []) : array {
        if(is_array($productCreationTemplate)){
            $options["json"]=$productCreationTemplate;
        } else {
            $options["json"]=$productCreationTemplate->getAttributes();
        }
        $array=$this->client->request(APIProductPath::createProduct($shopId), "POST", $options)->getArrayResponse();
        return $array;
    }

    /**
     * Този метод обновява данните на продукт вече съществуващ в printify
     * This method updates the data of a product already existing in printify
     * @param $shopId
     * @param $productId
     * @param array $data
     * @return array
     */
    public function updateProduct($shopId,$productId,array $data,array $options=[]){
        $options["json"]=$data;
        $array=$this->client->request(APIProductPath::updateProduct($shopId,$productId), "PUT", $options)->getArrayResponse();
        return $array;
    }

    /**
     * Този метод изтрива продукт вече съществуващ в printify
     * This method deletes a product already  existing in printify
     * @param $shopId
     * @param $productId
     * @return array
     */

     public function deleteProduct($shopId,$productId,$options = []){
        $array=$this->client->request(APIProductPath::deleteProduct($shopId,$productId), "DELETE", $options)->getArrayResponse();
        return $array;
     }

     /**
      * Този метод публиква продукт вече съществуващ в printify
      * This method publishes a product already existing in printify
      * @param $shopId
      * @param $productId
      * @param $publishData publish content like title ,description, images, variants, tags,keyFeatures,shipping_template
      */

      public function publish($shopId,$productId,$publishData = null, $options = []){
        if(is_null($publishData)){
          if(!array_key_exists("json",$options)){
            $options["json"]=[];
          }
          $options["json"]["title"]=true;
          $options["json"]["description"]=true;
          $options["json"]["images"]=true;
          $options["json"]["variants"]=true;
          $options["json"]["tags"]=true;
          $options["json"]["keyFeatures"]=true;
          $options["json"]["shipping_template"]=true;
        }
        $array=$this->client->request(APIProductPath::publishProduct($shopId,$productId), "POST", $options)->getArrayResponse();
        return $array;
      }

      /**
      * Този метод задава статус на успешна публикация
      * Set product publish status to succeeded
      * @param $shopId
      * @param $productId
      */

      public function succeededPublish($shopId,$productId,$externalId,$externalHandel,$options = []){
        if(!array_key_exists("json",$options)){
          $options["json"]=[];
        } 
        if(!array_key_exists("external",$options["json"])){
          $options["json"]["external"]=[];
        }
        $options["json"]["external"]["id"]=$externalId;
        $options["json"]["external"]["handle"]=$externalHandel;
        $array=$this->client->request(APIProductPath::succeededPublishProduct($shopId,$productId), "POST", $options)->getArrayResponse();
        return $array;
      }

      /**
      * Този метод задава статус на неуспешна публикация
      * Set product publish status to failed
      * @param $shopId
      * @param $productId
      */

      public function failedPublish($shopId,$productId,$reason="",$options = []){
        $options["json"]["reason"]=$reason;
        $array=$this->client->request(APIProductPath::failedPublishProduct($shopId,$productId), "POST", $options)->getArrayResponse();
        return $array;
      }


      /**
      * Този метод уведомява че продукта има отменена публикация
      * Notify that a product has been unpublished
      * @param $shopId
      * @param $productId
      */

      public function unpublish($shopId,$productId,$options = []){
        $array=$this->client->request(APIProductPath::unpublish($shopId,$productId), "POST", $options)->getArrayResponse();
        return $array;
      }


  
}