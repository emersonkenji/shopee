<?php

namespace Faiznurullah\Shopee\Request;

use Faiznurullah\Shopee\Config\config;
use Faiznurullah\Shopee\shopee;

class fisrtmile extends config
{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }


    public function getUnbindOrderList($url, $authcode, $shop_id, $page_size, $fields = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $response_optional_fields = implode(',', $fields);
        $response_optional_fields_encoded = urlencode($response_optional_fields);
        $suburl = $url . '/first_mile/get_unbind_order_list?access_token=' . $access_token . '&cursor=%22%22&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&response_optional_fields=' . $response_optional_fields_encoded . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }


    public function getDetail($url, $authcode, $shop_id, $track)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument  = $url . '/first_mile/get_detail?access_token=' . $access_token . '&cursor=%22%22&first_mile_tracking_number=' . $track . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function generateFirstMileTrackingNumber($url, $data = [])
    {
        $argument = $url . '/first_mile/generate_first_mile_tracking_number';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function bindFirstMileTrackingNumber($url, $data = [])
    {
        $argument =  $url . '/first_mile/bind_first_mile_tracking_number';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }


    public function unbindFirstMileTrackingNumber($url, $data = []){
        $argument = $url . '/first_mile/unbind_first_mile_tracking_number';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getTrackingNumberList($url, $authcode, $shop_id, $from, $page, $end){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url.'/first_mile/get_tracking_number_list?access_token=' . $access_token . '&cursor=%22%22&from_date='.$from.'&page_size='.$page.'&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest.'&to_date='.$end;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getWaybill($url, $data = []){
        $argument = $url . '/first_mile/get_waybill';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getChannelList($url, $data = []){
        $argument = $url . '/first_mile/get_channel_list';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }


}
