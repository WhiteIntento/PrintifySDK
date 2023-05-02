<?php
namespace PureIntento\PrintifySdk;


class APIUploadPath{

    /**
     * Path to retrieve a list of uploaded images
     * Път за извличане на списък с качените снимки
     * @return string
     */
    public static function uploadImages(){
        return "uploads.json";
    }

    /**
     * Path to retrive an uploaded image by id
     * @return string
     */

    public static function uploadedImage($imageId){
        return "uploads/$imageId.json";
    }

    /**
     * Path to Upload an image
     * @return string
     */

    public static function uploadImage(){
        return "uploads/images.json";
    }

    /**
     * Path to arhive uploaded image
     * @return string
     */

    public static function arhiveImage($imageId){
        return "uploads/$imageId/archive.json";
    }
}