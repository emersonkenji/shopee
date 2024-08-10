<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\config;

class shopee extends config{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function getShopInfo($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/shop/get_shop_info?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;  
    }


    public function getProfile($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/shop/get_profile?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }


    public function updateProfile($data = []){
        $suburl = '/shop/update_profile';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getWarehouseDetail($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/shop/get_warehouse_detail?access_token='.$access_token.'&partner_id='.$this->partnerid.'&region=ID&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getShopNotification($authcode, $shop_id, $cursor, $page_size){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/shop/get_shop_notification?access_token='.$access_token.'&cursor='.$cursor.'&page_size='.$page_size.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }


}