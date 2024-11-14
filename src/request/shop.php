<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class shop extends config
{

    private  $shopee, $url;
    public function __construct()
    { 
        $this->shopee = new shopee();
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_PRODUCTION_STATUS')){
            $this->url = 'https://partner.shopeemobile.com';
        }
        
    }

    public function getShopInfo($accesstoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/shop/get_shop_info', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/shop/get_shop_info?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }


    public function getProfile($accesstoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/shop/get_profile', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/shop/get_profile?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function updateProfile($accesstoken, $shop_id, $data)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/shop/update_profile', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/shop/update_profile?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getWarehouseDetail($accesstoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/shop/get_warehouse_detail', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/shop/get_warehouse_detail?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getShopNotification($accesstoken, $shop_id, $cursor, $page_size)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/shop/get_shop_notification', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/shop/get_shop_notification?access_token=' . $accesstoken . '&cursor=' . $cursor . '&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
}
