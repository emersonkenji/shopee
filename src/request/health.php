<?php

namespace Faiznurullah\Shopee\Request;

use Faiznurullah\Shopee\Config\config;
use Faiznurullah\Shopee\shopee;

class health extends config{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function shopPerformance($url, $authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $argument = $url.'/account_health/shop_performance?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function shopPenalty($url, $authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $argument = $url.'/account_health/shop_penalty?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getShopPerformance($url, $authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $argument = $url.'/account_health/get_shop_performance?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

}