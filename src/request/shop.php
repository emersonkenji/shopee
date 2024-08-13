<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\config;

class shopee extends config
{

    private  $partnerid,  $shopee;

    public function __construct($partnerid)
    {
        $this->partnerid = $partnerid; 
        $this->shopee = new shopee();
    }

    public function getShopInfo($url, $authcode, $shop_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/shop/get_shop_info?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }


    public function getProfile($url, $authcode, $shop_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/shop/get_profile?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function updateProfile($url, $data = [])
    {
        $argument = $url . '/shop/update_profile';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getWarehouseDetail($url, $authcode, $shop_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/shop/get_warehouse_detail?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&region=ID&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getShopNotification($url, $authcode, $shop_id, $cursor, $page_size)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/shop/get_shop_notification?access_token=' . $access_token . '&cursor=' . $cursor . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
}
