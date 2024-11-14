<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class deal extends config
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

    public function addOnDeal($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/add_add_on_deal', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/add_add_on_deal?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function addOnDealMainItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/add_add_on_deal_main_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/add_add_on_deal_main_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function addOnDealSubItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/add_add_on_deal_sub_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/add_add_on_deal_sub_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteAddOnDeal($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/delete_add_on_deal', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/delete_add_on_deal?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteOnDealMainItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/delete_add_on_deal_main_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/delete_add_on_deal_main_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteOnDealSubItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/delete_add_on_deal_sub_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/delete_add_on_deal_sub_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getOnDealList($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/delete_add_on_deal_sub_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/delete_add_on_deal_sub_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;  
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getOnDeal($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/get_add_on_deal', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/get_add_on_deal?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;  
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getOnDealMainItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/get_add_on_deal_main_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/get_add_on_deal_main_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;  
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getOnDealSubItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/get_add_on_deal_sub_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/get_add_on_deal_sub_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;  
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function updateOnDeal($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/update_add_on_deal', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/update_add_on_deal?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;  
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateOnDealMainItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/update_add_on_deal_main_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/update_add_on_deal_main_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;  
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateOnDealSubItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/update_add_on_deal_sub_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/update_add_on_deal_sub_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function endOnDeal($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/add_on_deal/end_add_on_deal', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/add_on_deal/end_add_on_deal?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
}
