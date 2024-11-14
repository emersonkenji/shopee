<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class pick extends config
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

    public function getTopPicksList($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/get_top_picks_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/top_picks/get_top_picks_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function addTopPicks($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/payment/get_top_picks_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/top_picks/add_top_picks?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateTopPicks($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/top_picks/update_top_picks', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/top_picks/update_top_picks?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteTopPicks($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/top_picks/delete_top_picks', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/top_picks/delete_top_picks?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    
}
