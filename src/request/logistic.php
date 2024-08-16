<?php

namespace Faiznurullah\Shopee\Request;

use Faiznurullah\Shopee\Config\config;
use Faiznurullah\Shopee\shopee;

class logistic extends config
{

    private  $partnerid,  $shopee;

    public function __construct($partnerid)
    {
        $this->partnerid = $partnerid; 
        $this->shopee = new shopee();
    }

    public function getShippingParameter($url, $authcode, $shop_id, $order_sn)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/get_shipping_parameter?access_token=' . $access_token . '&order_sn=' . $order_sn . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getTrackingNumber($url, $authcode, $shop_id, $order_sn, $miles)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/get_tracking_number?access_token=' . $access_token . '&order_sn=' . $order_sn . '&package_number=-&partner_id=' . $this->partnerid . '&response_optional_fields=' . $miles . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
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

    public function getTrackingInfo($url, $authcode, $shop_id, $order_sn, $package_number)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/get_tracking_info?access_token=' . $access_token . '&order_sn=' . $order_sn . '&package_number=' . $package_number . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
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

    public function getChannelList($url, $authcode, $shop_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/logistics/get_channel_list?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
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
