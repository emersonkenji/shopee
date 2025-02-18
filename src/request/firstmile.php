<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class firstmile extends config
{

    private  $shopee, $url;
    public function __construct()
    { 
        $this->timest = time();  
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(filter_var(env('SHOPEE_PRODUCTION_STATUS', true), FILTER_VALIDATE_BOOLEAN)){
            $this->url = 'https://partner.shopeemobile.com';
        }
        
        $this->shopee = new shopee(); 
    }


    public function getUnbindOrderList($accesstoken, $shop_id, $page_size, $fields = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/first_mile/get_unbind_order_list', $timestamp, $accesstoken, $shop_id);
        $response_optional_fields = implode(',', $fields);
        $response_optional_fields_encoded = urlencode($response_optional_fields);
        $suburl = $this->url . '/api/v2/first_mile/get_unbind_order_list?access_token=' . $accesstoken . '&cursor=%22%22&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&response_optional_fields=' . $response_optional_fields_encoded . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }


    public function getDetail($accesstoken, $shop_id, $track)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/first_mile/get_unbind_order_list', $timestamp, $accesstoken, $shop_id);
        $argument  = $this->url . '/api/v2/first_mile/get_detail?access_token=' . $accesstoken . '&cursor=%22%22&first_mile_tracking_number=' . $track . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function generateFirstMileTrackingNumber($accesstoken, $shop_id, $data = [])
    { 
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/first_mile/generate_first_mile_tracking_number', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/first_mile/generate_first_mile_tracking_number?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function bindFirstMileTrackingNumber($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/first_mile/bind_first_mile_tracking_number', $timestamp, $accesstoken, $shop_id);
        $argument =  $this->url . '/api/v2/first_mile/bind_first_mile_tracking_number?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }


    public function unbindFirstMileTrackingNumber($accesstoken, $shop_id, $data = []){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/first_mile/unbind_first_mile_tracking_number', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/first_mile/unbind_first_mile_tracking_number?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getTrackingNumberList($accesstoken, $shop_id, $from, $page, $end){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/first_mile/get_tracking_number_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/first_mile/get_tracking_number_list?access_token=' . $accesstoken . '&cursor=%22%22&from_date='.$from.'&page_size='.$page.'&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp .'&to_date='.$end;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getWaybill($accesstoken, $shop_id, $data = []){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/first_mile/get_waybill', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/first_mile/get_waybill/get_detail?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getChannelList($accesstoken, $shop_id, $region){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/first_mile/get_channel_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/first_mile/get_channel_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&region='.$region.'&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }


}
