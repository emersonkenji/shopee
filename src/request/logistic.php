<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class logistic extends config
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

    public function getShippingParameter($accesstoken, $shop_id, $order_sn)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/get_shipping_parameter', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/get_shipping_parameter?access_token=' . $accesstoken . '&order_sn=' . $order_sn . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
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

    public function shipOrder($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/ship_order', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/ship_order?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateShipOrder($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/update_shipping_order', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/update_shipping_order?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getShippingDocumentParameter($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/get_shipping_document_parameter', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/get_shipping_document_parameter?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function createShippingDocument($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/create_shipping_document', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/create_shipping_document?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getShippingDocumentResult($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/get_shipping_document_result', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/get_shipping_document_result?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function downloadShippingDocument($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/download_shipping_document', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/download_shipping_document?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
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

    public function getAddressList($accesstoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/get_address_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/get_address_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function setAddressConfig($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/set_address_config', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/set_address_config?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteAddress($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/delete_address', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/delete_address?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getChannelList($accestoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/get_channel_list', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/get_channel_list?access_token=' . $accestoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function updateChannel($accestoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/update_channel', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/update_channel?access_token=' . $accestoken . '&partner_id=' .  env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function batchShipOrder($accestoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/update_channel', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/batch_ship_order?access_token=' . $accestoken . '&partner_id=' .  env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getShippingDocument($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/get_shipping_document_data_info', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/get_shipping_document_data_info?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateTrackingStatus($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/logistics/update_tracking_status', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/logistics/update_tracking_status?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
}
