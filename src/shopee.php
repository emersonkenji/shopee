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
                        // Pastikan data berupa array dan memiliki key 'image_path'
                        if (!isset($data['image_path'])) {
                            throw new \Exception('Path gambar tidak ditemukan.');
                        }
                    
                        // Ambil path dan pastikan file ada
                        $filePath = $data['image_path'];
                        if (!file_exists($filePath)) {
                            throw new \Exception("File tidak ditemukan: " . $filePath);
                        }
                    
                        // Kirim request menggunakan Guzzle dengan multipart
                        $response = $this->client->post(
                            $url,
                            [
                                'multipart' => [
                                    [
                                        'name'     => 'image',  // Pastikan ini sesuai dengan API Shopee
                                        'contents' => fopen($filePath, 'r'),  
                                        'filename' => basename($filePath)
                                    ]
                                ]
                            ]
                        );
                    
                        return $response->getBody()->getContents();
                    }
                    
                    
                }