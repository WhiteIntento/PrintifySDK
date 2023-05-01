<?php
namespace PureIntento\PrintifySdk;


class APIProductPath{

    
    /**
     * Api path for Retrieve a list of all products
     * Път за извличане на списък с всички продукти
     * @param int $shopId Shop id
     * @return string api path
     */
    public static function products($shopId){
        return "shops/$shopId/products.json";
    }


    /**
     * Api path to retrive a product
     * @param int $shopId
     * @param int $productId
     * @return string api path
     */

     public static  function product($shopId,$productId){
        return "shops/$shopId/products/$productId.json";
     }
     
     /**
      * Api path to create product
      * @param int $shopId
      * @return string api path
      */
     public static function createProduct($shopId){
        return "shops/$shopId/products.json";
     }

     /**
     * Api path to update a product
     * @param int $shopId
     * @param int $productId
     * @return string api path
     */

    public static function updateProduct($shopId,$productId){
        return "shops/$shopId/products/$productId.json";
     }

     /**
      * Api path to delete a product
      * @param int $shopId
      * @param int $productId
      * @return string api path
      */
      public static function deleteProduct($shopId,$productId){
        return "shops/$shopId/products/$productId.json";
     }
     
     /**
      * Api path to publish a product
      * @param int $shopId
      * @param int $productId
      * @return string api path
      */

      public static function publishProduct($shopId,$productId){
        return "shops/$shopId/products/$productId/publish.json";
      }

      /**
       * Api path to set product publish status to succeeded
       * @param int $shopId
       * @param int $productId
       * @return string api path
       */

      public static function succeededPublishProduct($shopId,$productId){
        return "shops/$shopId/products/$productId/publishing_succeeded.json";
      }

      /**
       * Api path to set product publish status to failed
       * @param int $shopId
       * @param int $productId
       * @return string api path
       */

      public static function failedPublishProduct($shopId,$productId){
        return "shops/$shopId/products/$productId/publishing_failed.json";
      }

      /**
       * Api path to notify that a product has been unpublished
       * @param int $shopId
       * @param int $productId
       * @return string api path
       */

      public static function unpublish($shopId,$productId){
        return "shops/$shopId/products/$productId/unpublish.json";
      }
}