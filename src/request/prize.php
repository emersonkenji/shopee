<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class prize extends config
{


    private  $shopee, $url;
    public function __construct()
    { 
        $this->shopee = new shopee();
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_DEVELOPMENT_STATUS')){
            $this->url = 'https://partner.shopeemobile.com';
        }
        
    }
    public function addFollowPrize($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/follow_prize/add_follow_prize', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/follow_prize/add_follow_prize?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteFollowPrize($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/follow_prize/delete_follow_prize', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/follow_prize/delete_follow_prize?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function endFollowPrize($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/follow_prize/end_follow_prize', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/follow_prize/end_follow_prize?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateFollowPrize($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/follow_prize/update_follow_prize', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/follow_prize/update_follow_prize?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getFollowPrizeDetail($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/follow_prize/get_follow_prize_detail', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/follow_prize/get_follow_prize_detail?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getFollowPrizeList($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/follow_prize/get_follow_prize_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/follow_prize/get_follow_prize_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    
}
