<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class merchant extends config
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

    public function getMerchantInfo($accestoken, $shop_id, $merchant_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/merchant/get_merchant_info', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/merchant/get_merchant_info?access_token=' . $accestoken . '&merchant_id=' . $merchant_id . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getShopListByMerchant($accestoken, $shop_id, $merchant_id, $page, $page_size)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/merchant/get_shop_list_by_merchant', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/merchant/get_shop_list_by_merchant?access_token=' . $accestoken . '&merchant_id=' . $merchant_id . '&page_no=' . $page . '&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getMerchantWarehouse($accestoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/merchant/get_merchant_warehouse_location_list', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/merchant/get_merchant_warehouse_location_list?access_token='.$accestoken.'&partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getMerchantWarehouseList($accestoken, $shop_id, $merchant_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/merchant/get_merchant_warehouse_list', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/merchant/get_merchant_warehouse_list?access_token=' . $accestoken . '&merchant_id=' . $merchant_id . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getWarehouseEligibleShopList($accestoken, $shop_id, $merchant_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/merchant/list_shop_by_warehouse', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/merchant/list_shop_by_warehouse?access_token=' . $accestoken . '&merchant_id=' . $merchant_id . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
}
