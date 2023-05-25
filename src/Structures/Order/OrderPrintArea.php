<?php
namespace PureIntento\PrintifySdk\Structures\Order;

use PureIntento\PrintifySdk\Structures\Structure;

class OrderPrintArea extends Structure{
    
    protected array $requiredAttributes=[
        "src",
        "scale",
        "x",
        "y",
        "angle"
    ];

    public function __construct($src,$scale,$x,$y,$angle){
        $this->src=$src;
        $this->scale=$scale;
        $this->x=$x;
        $this->y=$y;
        $this->angle=$angle;
    }
}