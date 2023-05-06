<?php
namespace PureIntento\PrintifySdk\Structures\Templates;

use PureIntento\PrintifySdk\Structures\Structure;

class ImageTemplate extends Structure{
    protected array $requiredAttributes=[
        "id",
        "x",
        "y",
        "scale",
        "angle"
    ];

    public function __construct(int|string $id,$x,$y,$scale,$angle){
        $this->attributes=[
            "id"=>$id,
            "x"=>$x,
            "y"=>$y,
            "scale"=>$scale,
            "angle"=>$angle,
        ];
    }
}