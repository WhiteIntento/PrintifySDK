<?php
namespace PureIntento\PrintifySdk\Structures\Order;

use PureIntento\PrintifySdk\Structures\Structure;

class OrderPrintDetails extends Structure{

    /**
     * @param $printOnSide must be regular,mirror,off
     * @param $separatorType must be Numbers or Lines
     * @param $separatorColor must be string hexadecimal color code
     */

    public function __construct($printOnSide,$separatorType=null,$separatorColor){
        $this->attributes["print_on_side"]=$printOnSide;
        if(!is_null($separatorType)){
            $this->attributes["separator_type"]=$separatorType;
            $this->attributes["separator_color"]=$separatorColor;
        }
    }
}