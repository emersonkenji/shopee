<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class logistic extends config
{

    private  $partnerid,  $shopee, $url;

    public function __construct($partnerid)
    {
        $this->partnerid = $partnerid; 
        $this->shopee = new shopee();

        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_STATUS_STAGING') == 'Production'){
            $this->url = 'https://partner.shopeemobile.com';
        }
    }

    public function getShippingParameter($url, $authcode, $shop_id, $order_sn)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/get_shipping_parameter?access_token=' . $access_token . '&order_sn=' . $order_sn . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getTrackingNumber($accesstoken, $shop_id, $order_sn, $miles = 'first_mile_tracking_number')
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/get_tracking_number', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/get_tracking_number?access_token=' . $accesstoken . '&order_sn=' . $order_sn . '&package_number=-&partner_id=' . env('SHOPEE_PATNER_ID') . '&response_optional_fields=' . $miles . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function shipOrder($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/shiporder?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateShipOrder($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/update_shipping_order?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getShippingDocumentParameter($url, $data = [])
    {
        $argument = $url . '/logistics/get_shipping_document_parameter';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function createShippingDocument($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/create_shipping_document?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getShippingDocumentResult($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/get_shipping_document_result?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function downloadShippingDocument($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/download_shipping_document?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getTrackingInfo($accesstoken, $shop_id, $order_sn)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/get_tracking_info', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/get_tracking_info?access_token=' . $accesstoken . '&order_sn=' . $order_sn .  '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getAddressList($url, $authcode, $shop_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/get_address_list?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function setAddressConfig($url, $data = [])
    {
        $argument = $url . '/logistics/set_address_config';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteAddress($url, $data = [])
    {
        $argument = $url . '/logistics/delete_address';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getChannelList($accestoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/get_channel_list', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/get_channel_list?access_token=' . $accestoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . time();
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function updateChannel($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/update_channel?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function batchShipOrder($url, $data = [])
    {
        $argument = $url . '/logistics/batch_ship_order';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getShippingDocument($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/get_shipping_document_data_info?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateTrackingStatus($url, $data = [])
    {
        $argument = $url . '/logistics/update_tracking_status';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
}
