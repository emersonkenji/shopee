<?php

namespace Faiznurullah\Shopee;

use GuzzleHttp\Client;

class shopee{
    
    
    private $url;
    private $client;  
    
    public function __construct()
    { 
        $this->url = 'https://partner.test-stable.shopeemobile.com/api/v2';

        $this->client = new Client();  

        if(env('SHOPEE_STATUS_STAGING') == 'Production'){

            $this->url = 'https://partner.shopeemobile.com/api/v2';

        }
 
    }


    public function getMethod($suburl){ 

        $response = $this->client->get(
            $this->url . $suburl,
            [
                'header' => [
                    'Content-Type' => 'application/json',
                ]
            ]
        );

        return $response->getBody()->getContents();
       
    }

    public function getMethodWithPayload($suburl, $data){

        $response = $this->client->get(
            $this->url.$suburl,
            [
                'header' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => $data
            ]
        );

        return $response;
    }


    public function postMethod($suburl, $data){
        
        $response  = $this->client->post(
            $this->url . $suburl,
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