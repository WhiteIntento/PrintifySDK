<?php
namespace PureIntento\PrintifySdk\Structures\Order;

use PureIntento\PrintifySdk\Structures\Structure;


class OrderCreationTemplate extends Structure{
    protected array $requiredAttributes=[
        "external_id",
        "label",
        "line_items",
        "shipping_method",
        "send_shipping_notification",
        "address_to"
    ];

    public function __construct($externalId,$label,$line_items=[],$shippingMethod=1,$send_shipping_notification=false){
        $this->attributes=[
            "external_id"=>$externalId,
            "label"=>$label,
            "shipping_method"=>$shippingMethod,
            "send_shipping_notification"=>$send_shipping_notification,
            "line_items",
            "address_to"
        ];
    }

    public function addAddress(OrderAddress $address){
        $this->attributess["address_to"]=$address->getAttributes();
    }

    /**
     * Добавя създаден продукт в поръчката
     */

    public function addProductLineItem($productId,$variantId,$quantity){
        $this->attributes["line_items"][]=[
            "product_id"=>$productId,
            "variant_id"=>$variantId,
            "quantity"=>$quantity
        ];
    }

    /**
     * Добавя продукт по sku номер
     */
    public function addSkuLineItem($sku,$quantity){
        $this->attributes["line_items"][]=[
            "sku"=>$sku,
            "quantity"=>$quantity
        ];
    }

    protected function createPrintAreaLineItem($printProviderId,$blueprintId,$variantId, array | OrderPrintAreas  $printArea){
        if($printArea instanceof OrderPrintAreas){
            $pa=$printArea->getAttributes();
        } else if(is_array($printArea)){
            $pa=[];
            foreach($printArea as $value){
                if(count($value)==2){
                    $pa[]=[
                        $value[0]=>$value[1]
                    ];
                } else {
                    throw new \Exception("Print area must be valid array with 2 params: position and src");
                }
            }
        }
        return [
            "print_provider_id"=>$printProviderId,
            "blueprint_id"=>$blueprintId,
            "variant_id"=>$variantId,
            "print_areas"=>$pa
        ];
    }

    public function addPrintAreaLineItem($printProviderId,$blueprintId,$variantId, array | OrderPrintAreas  $printArea){
        $this->attributes[]=$this->createPrintAreaLineItem($printProviderId,$blueprintId,$variantId,$printArea);
    }

    /**
     * @param $printProviderId
     * @param $blueprintId
     * @param $variantId
     * @param $printArea must be OrderPrintAreas or multi array with postion and image src url
     * @param $printDetails must be OrderPrintDetails or string then print_on_side = $printDetails and must be regular,mirror,off
     */
    public function addPrintAreaLineItemWithDetail($printProviderId,$blueprintId,$variantId, array | OrderPrintAreas  $printArea,OrderPrintDetails | string $printDetails){
        $attributes=$this->createPrintAreaLineItem($printProviderId,$blueprintId,$variantId,$printArea);
        if($printDetails instanceof OrderPrintDetails){
            $attributes["print_details"]=$printDetails->getAttributes();
        } else if(is_string($printDetails)){
            $attributes["print_details"]=[
                "print_on_side"=>$printDetails
            ];
        }
        $this->attributes=$attributes;
    }
}