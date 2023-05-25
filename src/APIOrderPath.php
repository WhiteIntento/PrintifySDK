<?php
namespace PureIntento\PrintifySdk;


class APICatalogPath{


    /**
     * Api path for retrieve a list of orders
     * Апи патх за извличане на списък с поръчки
     * @param $shopId mix
     */
    public function orders($shopId){
        return "shops/$shopId/orders.json";
    }


    /**
     * Api path for get order details by id
     * Апи път за вземане на дейтаийли на поръчка по идентификатора и
     * @param $shopId mix
     * @param $id mix
     */

    public function order($shopId,$id){
        return "shops/$shopId/orders/$id.json";
    }

    /**
     * Api path for submit an order
     * АПИ път за изпращане на поръчка
     * @param $shopId mix
     */

    public function submitOrder($shopId){
        return "shops/$shopId/orders.json";
    }

    /**
     * Api path for send an existing order to production
     * Този пат е за изпращане на съществуваща поръчка за производство
     * @param $shopId mix
     * @param $id mix
     */

     public function sendOrderProduction($shopId,$id){
        return "shops/$shopId/orders/$id/send_to_production.json";
     }

     /**
      * Api path for calculate the shipping cost of an order
      * Апи път за изчисляване на цената на доставка за поръчката
      * @param $shopId mix
      */

      public function calculateShippingCost($shopId){
        return "shops/$shopId/orders/shipping.json";
      }

      /**
       * Api path for cancel an unpaid order
       * Апи път за отказване на неплатена поръчка
       * @param $shopId mix
       * @param $id mix
       */

       public function cancelOrder($shopId,$id){
        return "shops/$shopId/orders/$id/cancel.json";
       }
}