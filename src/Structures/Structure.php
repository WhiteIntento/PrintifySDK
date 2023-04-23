<?php
namespace PureIntento\PrintifySdk\Structures;

class Structure{
        /**
     * This parameter holds the api response
     * Този парамтетър държи отговора на api
     */
    protected array $attributes = [];
    /**
     * Stores the required data that the app should return
     * Съхранява задължителните данни които api трябва да върне
     */
    protected array $requiredAttributes=[];

    public function __construct(array $attributes = [], $checkRequired=true){
        if($attributes && $checkRequired){
            $this->checkForMissingAttributes($attributes);
        }
        $this->attributes=$attributes;
        
    }


    public function __get(string $key)
    {
        if (property_exists($this, $key)) {
            return $this->{$key};
        }
        return $this->attributes[$key];
    }

    /**
     * Този метод валидира данните в структурата спрямо задължителните атрибути
     * This method validates the data in the structure against the required attributes
     */

    public function validate(){
        $this->checkForMissingAttributes();
    }

    protected function checkForMissingAttributes($attributes,$requiredAttributes = null){
        if(is_null($requiredAttributes)){
            $requiredAttributes=$this->requiredAttributes;
        }
        foreach($requiredAttributes as $key=>$value){
            if(is_array($value)){
                if(!array_key_exists($key,$attributes)){
                    throw new \PureIntento\PrintifySdk\Exceptions\MissingRequiredAttribute("Missing ". $key);
                }
                $this->checkForMissingAttributes($attributes[$key],$value);
                continue;
            }
            if(!array_key_exists($value,$attributes)){
                throw new \PureIntento\PrintifySdk\Exceptions\MissingRequiredAttribute("Missing ". $key);
            }
        }
    }
}