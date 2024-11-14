<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class push extends config{

    private  $shopee, $url;
    public function __construct()
    { 
        $this->shopee = new shopee();
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_PRODUCTION_STATUS')){
            $this->url = 'https://partner.shopeemobile.com';
        }
        
    }

    public function setAppPushConfig($accesstoken, $shop_id, $data = []){ 
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/push/set_app_push_config', $timestamp, $accesstoken, $shop_id);     
        $argument = $this->url.'/api/v2/push/set_app_push_config?partner_id='.env('SHOPEE_PATNER_ID').'&sign='.$sign.'&timestamp='.$timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getAppPushConfig($accesstoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/push/get_app_push_config', $timestamp, $accesstoken, $shop_id);     
        $argument = $this->url.'/api/v2/push/get_app_push_config?partner_id='.env('SHOPEE_PATNER_ID').'&sign='.$sign.'&timestamp='.$timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getLostPushMessage($accesstoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/push/get_lost_push_message', $timestamp, $accesstoken, $shop_id);     
        $argument = $this->url.'/api/v2/push/get_lost_push_message?partner_id='.env('SHOPEE_PATNER_ID').'&sign='.$sign.'&timestamp='.$timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function confirmConsumedLostPushMessage($accesstoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/push/confirm_consumed_lost_push_message', $timestamp, $accesstoken, $shop_id);     
        $argument = $this->url.'/api/v2/push/confirm_consumed_lost_push_message?partner_id='.env('SHOPEE_PATNER_ID').'&sign='.$sign.'&timestamp='.$timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    

}