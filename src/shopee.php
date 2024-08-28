<?php

namespace Faiznurullah\Shopee;

use GuzzleHttp\Client;

class shopee{
     
    private $client;  
    
    public function __construct()
    { 
         

        $this->client = new Client();  

        
 
    }


    public function getMethod($url){ 

        $response = $this->client->get(
          $url,
            [
                'header' => [
                    'Content-Type' => 'application/json',
                ]
            ]
        );

        return $response->getBody()->getContents();
       
    }

    public function getMethodWithPayload($url, $data){

        $response = $this->client->get(
           $url,
            [
                'header' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => $data
            ]
        );

        return $response;
    }


    public function postMethod($url, $data){
        
        $response  = $this->client->post(
            $url,
            [
                'header' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => $data
            ]
        );
  
        return $response->getBody()->getContents();  
    }

    
    
    
}