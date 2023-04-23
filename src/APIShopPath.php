<?php
namespace PureIntento\PrintifySdk;

class APIShopPath{
    public static function shops(){
        return "shops.json";
    }

    public static function deleteShop($shopId){
        return "shops/$shopId/connection.json";
    }
}