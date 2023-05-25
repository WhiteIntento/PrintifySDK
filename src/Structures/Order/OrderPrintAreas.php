<?php
namespace PureIntento\PrintifySdk\Structures\Order;

use PureIntento\PrintifySdk\Structures\Structure;

class OrderPrintAreas extends Structure{

    public function __construct($attributes=[]){
        $this->attributes=$attributes;
    }

    public function add($position,OrderPrintArea | string $orderPrintArea){
        if($orderPrintArea instanceof OrderPrintArea){
            $this->attributes[$position]=$orderPrintArea->getAttributes();
        } else {
            $this->attributes[$position]=$orderPrintArea;
        }
    }
    
}