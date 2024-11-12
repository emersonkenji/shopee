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
                    
                    public function postMethodFile($url, $data)
                    {  

                        if (!isset($data['image_path'])) {
                            throw new \Exception('Path gambar tidak ditemukan.');
                        } 
                         
                        $filePath = $data['image_path'];
                        if (!file_exists($filePath)) {
                            throw new \Exception("File tidak ditemukan: " . $filePath);
                        } 
                        
                        $response = $this->client->post(
                            $url,
                            [
                                'multipart' => [
                                    [
                                        'name'     => 'image',  
                                        'contents' => fopen($filePath, 'r'),  
                                        'filename' => basename($filePath)
                                    ]
                                ]
                            ]
                        );
                    
                        return $response->getBody()->getContents();
                    }
                    
                    
                }