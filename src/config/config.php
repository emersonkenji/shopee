<?php 

namespace Faiznurullah\Shopee\config; 
use Faiznurullah\Shopee\shopee;

class config{
    
    private $partnerid;
    private $partnerkey;
    private $redirectUrl;
    private $host;
    public $timest;
    private $path;
    private $shopee;
    
    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey; 
        $this->timest = time();
        $this->path = '/api/v2/shop/auth_partner';
        
        $this->shopee = new shopee($partnerid, $partnerkey);
        
        $this->host = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_STATUS_STAGING') == 'Production'){
            $this->host = 'https://partner.shopeemobile.com';
        }
        
    }
    
    
    public function getSign(){
        
        $baseString = sprintf("%s%s%s", $this->partnerid, $this->path, $this->timest);
        $sign = hash_hmac('sha256', $baseString, $this->partnerkey); 
        return $sign;
    }
    
    public function getPartnerid(){
        return $this->partnerid;
    }
    
    public function getPartnerKey(){
        return $this->partnerkey;
    }
    
    
    public function authShop(){
        $this->getSign();
        $url = sprintf("%s%s?partner_id=%s&timestamp=%s&sign=%s&redirect=%s", $this->host, $this->path, $this->partnerid, $this->timest, $this->getSign(), urlencode($this->redirectUrl)); 
        return $url;
    }
    
    public function getAccesToken($authCode, $shop_id){
        
        $suburl = "/api/v2/auth/token/get";
        $data = [
            "code" => $authCode,
            "shop_id" => $shop_id,
            "partner_id" => $this->partnerid
        ];
        
        $response = $this->shopee->postMethod($suburl, $data); 
        return  $response;
        
    }
    
    
    
    
    
}