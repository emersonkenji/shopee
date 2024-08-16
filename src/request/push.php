<?php

namespace Faiznurullah\Shopee\Request;

use Faiznurullah\Shopee\Config\config;
use Faiznurullah\Shopee\shopee;

class push extends config{

    private  $partnerid , $shopee;

    public function __construct($partnerid)
    {
        $this->partnerid = $partnerid; 
        $this->shopee = new shopee();
    }

    public function setAppPushConfig($url, $data = []){ 
        $sign = parent::getSign();
        $argument = $url.'/push/set_app_push_config?partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getAppPushConfig($url)
    {
        $sign = parent::getSign();
        $argument = $url.'/push/get_app_push_config?partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getLostPushMessage($url)
    {
        $sign = parent::getSign();
        $argument = $url.'/push/get_lost_push_message?partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function confirmConsumedLostPushMessage($url)
    {
        $sign = parent::getSign();
        $argument = $url.'/push/confirm_consumed_lost_push_message?partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    

}