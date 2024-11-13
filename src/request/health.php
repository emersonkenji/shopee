<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class health extends config{

    private  $shopee, $url;
    public function __construct()
    { 
        $this->shopee = new shopee();
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_DEVELOPMENT_STATUS')){
            $this->url = 'https://partner.shopeemobile.com';
        }
        
    }

    public function shopPerformance($accesstoken, $shop_id){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/account_health/shop_performance', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/account_health/shop_performance?access_token='.$accesstoken.'&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function shopPenalty($accesstoken, $shop_id){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/account_health/shop_penalty', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/account_health/shop_penalty?access_token='.$accesstoken.'&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getShopPerformance($accesstoken, $shop_id){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/account_health/get_shop_performance', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/account_health/get_shop_performance?access_token='.$accesstoken.'&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

}