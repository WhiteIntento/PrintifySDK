<?php
namespace PureIntento\PrintifySdk;
use GuzzleHttp\Client;

/**
 * Този клас има за цел да е отправна точка за иницилиазиране на апи. 
 * This class is intended to be a starting point for initializing api.
 */
class PrintifyClient{
    protected string $api_key;
    protected array $headers=[];
    protected bool $status;
    protected Client $client;
    protected int $timeout=10;
    protected $apiVersion="v1";
    protected string $apiDomain="api.printify.com";
    protected string $apiScheme="https://";
    protected string $apiUrl;
    
    public function __construct(string $api_key){
        $this->api_key = $api_key;
        $this->apiUrl=$this->apiScheme . $this->apiDomain . "/" . $this->apiVersion;
        $this->initClient();
    }

    protected function initClient() : void{
        $this->headers = [
            'Authorization' => 'Bearer ' . $this->api_key,
            'Content-Type' => 'application/json',
        ];

        $this->client=new Client([
            'base_uri' => $this->apiUrl,
            'headers' => $this->headers,
            "timeout" => $this->timeout
        ]);
    }


    public function getApiKey() : string{
        return $this->api_key;
    }

    public function setApiKey($key) : void{
        $this->api_key=$key;
        $this->initClient();
    }

    public function getClient(): Client{
        return $this->client;
    }

    public function request($path,$method="GET",$options=[]): Query{
        $q=(new Query($this->client))->request($this->apiUrl . "/" . $path,$method,$options);
        if($q->status==false){
            $error=$q->getError();
            if($error != null){
                throw new Exceptions\PrintifyError($error);
            }
        }
        return $q;
    }
}