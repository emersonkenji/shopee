<?php 

namespace Faiznurullah\Shopee\config; 
use Faiznurullah\Shopee\shopee;

class config{
    
    
    private $redirectUrl;
    public $host;
    public $timest; 
    private $shopee;
    
    public function __construct()
    { 
        $this->timest = time(); 
        $this->redirectUrl = env('SHOPEE_REDIRECT_URL');
        
        $this->host = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_PRODUCTION_STATUS')){
            $this->host = 'https://partner.shopeemobile.com';
        }
        
        $this->shopee = new shopee();
        
    }
    
    
    
    
    public function getGenerateSign($path, $time, $accestoken = '', $shop_id = ''){ 
        $baseString = sprintf("%s%s%s%s%s", env('SHOPEE_PATNER_ID'), $path, $time, $accestoken, $shop_id);
        return hash_hmac('sha256', $baseString, env('SHOPEE_PATNER_KEY'));
    }
    
    public function getSign($path){ 
        $baseString = sprintf("%s%s%s", env('SHOPEE_PATNER_ID'), $path, time());
        $sign = hash_hmac('sha256', $baseString, env('SHOPEE_PATNER_KEY')); 
        return $sign;
    }
    
    
    public function authShop(){ 
        $sign = $this->getSign('/api/v2/shop/auth_partner');
        $path = '/api/v2/shop/auth_partner';
        $url = sprintf("%s%s?partner_id=%s&timestamp=%s&sign=%s&redirect=%s", $this->host, $path, env('SHOPEE_PATNER_ID'), $this->timest, $sign, urlencode($this->redirectUrl)); 
        return $url;
    }
    
    
    
    public function getRefreshToken($refreshtoken, $shop_id)
    { 
        $sign = $this->getSign('/api/v2/auth/access_token/get');
        $partner_id  = (int) env('SHOPEE_PATNER_ID');
        $url = $this->host."/api/v2/auth/access_token/get?partner_id=".$partner_id.'&timestamp='.time()."&sign=". $sign;
        
        $data = [
            "refresh_token" => $refreshtoken,
            "shop_id" => (int) $shop_id,
            "partner_id" => $partner_id   
        ];
        
        $response = $this->shopee->postMethod($url, $data); 
        return $response;
    }
    
    
    
    public function getAccesToken($authCode, $shop_id)
    { 
        $sign = $this->getSign('/api/v2/auth/token/get');
        $partner_id  = (int) env('SHOPEE_PATNER_ID');
        $url = $this->host."/api/v2/auth/token/get?partner_id=".$partner_id.'&timestamp='.time()."&sign=". $sign;
        
        $data = [
            "code" => $authCode,
            "shop_id" => (int) $shop_id,
            "partner_id" => $partner_id  // Pastikan ini adalah integer
        ];
        
        $response = $this->shopee->postMethod($url, $data); 
        return $response;
    }
    
    
    
}