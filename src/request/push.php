<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\Config\config;

class push extends config{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function setAppPushConfig($data = []){ 
        $sign = parent::getSign();
        $suburl = '/push/set_app_push_config?partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getAppPushConfig(){
        $sign = parent::getSign();
        $suburl = '/push/get_app_push_config?partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getLostPushMessage(){
        $sign = parent::getSign();
        $suburl = '/push/get_lost_push_message?partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function confirmConsumedLostPushMessage(){
        $sign = parent::getSign();
        $suburl = '/push/confirm_consumed_lost_push_message?partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

}