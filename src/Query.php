<?php
namespace PureIntento\PrintifySdk;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response as HTTPResponse;

class Query{

    public bool $status=false;
    public HTTPResponse $response;
    public Client $client;

    public function __construct(Client $client){
        $this->client=$client;
    }

    public function request($url,$method="GET",$options=[]){
        try{
            $this->status=true;
            $response=$this->client->request($method,$url,$options);
        } catch(RequestException $e){
            $this->status=false;
            $response=$e->getResponse();
        }
        $this->response=$response;
        return $this;
    }

    public function getError() : string | null{
        $response=$this->getArrayResponse();
        if(array_key_exists("error",$response)){
            return $response["error"];
        }
        return null;
    }

    public function getArrayResponse() : array{
        $json=json_decode($this->response->getBody(),true);
        if(!is_null($json)){
            return $json;
        }
        return [];
    }
    
}