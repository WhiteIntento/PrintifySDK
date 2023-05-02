<?php
namespace PureIntento\PrintifySdk;

class Upload{
    
    protected PrintifyClient $client;

    public function __construct(PrintifyClient $client){
        $this->client=$client;
    }

    /**
     * This method returns a list of uploaded images
     * Този метод връща списък с качените снимки
     * @return StructureCollection
     */

    public function uploadedImages($options = []){
        $array=$this->client->request(APIUploadPath::uploadImages(),"GET",$options)->getArrayResponse();
        return new StructureCollection(Structures\Image::class,$array);
    }

    /**
     * This method returns details for a specific uploaded image
     * Този метод връща детайли за конкретна качена снимка
     * @param int|string $imageId
     * @return Structres\Image
     */

    public function uploadedImage($imageId,$options = []){
        $array=$this->client->request(APIUploadPath::uploadedImage($imageId),"GET",$options)->getArrayResponse();
        return new Structures\Image($array);
    }

    protected function generateRandomName($size=10){
        return bin2hex(random_bytes($size));
    }

    public function uploadImageByUrl($url,$fileName=null,$options=[]) : array{
        if (!filter_var($url, FILTER_VALIDATE_URL) !== false) {
            throw new \InvalidArgumentException("url must be valid");
        }
        if($fileName==null){
            $fileName=$this->generateRandomName();
        }
        $options["json"]["file_name"]=$fileName;
        $options["json"]["url"]=$url;
        $array=$this->client->request(APIUploadPath::uploadImage(),"POST",$options)->getArrayResponse();
        return $array;
    }

    public function uploadImageByBase64($base64Conent, $fileName=null,$options=[]) : array{
        if($fileName==null){
            $fileName=$this->generateRandomName();
        }
        if(strlen($base64Conent)>5000000){
            throw new \InvalidArgumentException("base64 content must be smaller than 5 MB");
        }
        $options["json"]["file_name"]=$fileName;
        $options["json"]["contents"]=$base64Conent;
        $array=$this->client->request(APIUploadPath::uploadImage(),"POST",$options)->getArrayResponse();
        return $array;
    }
    

}