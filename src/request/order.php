<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;

class order extends config
{


    private  $partnerid, $shopee, $url;
    public function __construct($partnerid)
    {
        $this->partnerid = $partnerid; 
        $this->shopee = new shopee();

        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_STATUS_STAGING') == 'Production'){
            $this->url = 'https://partner.shopeemobile.com';
        }

    }

    public function getOrderList($accesstoken, $shop_id, $time_from = 0, $time_to = 0, $order_status = 'READY_TO_SHIP', $page_size = 20)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/get_order_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/get_order_list?access_token=' . $accesstoken . '&order_status=' . $order_status . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&time_from=' . $time_from . '&time_range_field=create_time&time_to=' . $time_to . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getShipmentList($url, $authcode, $shop_id, $cursor = '', $page_size = 20, $order_status = '', $time_from = 0, $time_to = 0)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/order/get_shipment_list?access_token=' . $access_token . '&cursor=%22' . $cursor . '%22&order_status=' . $order_status . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&time_from=' . $time_from . '&time_to=' . $time_to . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }


    public function getOrderDetail($accestoken, $shop_id, $order_sn_list, $request_order_status_pending = true, $response_optional_fields = 'item_list')
    {
        $paramsn = implode(',', $order_sn_list);
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/get_order_detail', $timestamp, $accestoken, $shop_id);
        $argument = $this->url . '/api/v2/order/get_order_detail?access_token=' . $accestoken . '&order_sn_list=' . $paramsn . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&request_order_status_pending=' . $request_order_status_pending . '&response_optional_fields=' . $response_optional_fields . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function splitOrder($url, $authcode, $shop_id, $order_sn, $items)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/order/split_order?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest . '&order_sn=' . $order_sn . '&items=' . $items;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function unSplitOrder($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/order/unsplit_order?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function cancelOrder($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/order/cancel_order?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function handleBuyerCancellation($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/order/handle_buyer_cancellation?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function setNote($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/order/set_note?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getPendingBuyerInvoiceOrderList($url, $authcode, $shop_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/order/get_pending_buyer_invoice_order_list?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function uploadInvoiceDoc($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/order/upload_invoice_doc?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function downloadInvoiceDoc($accesstoken, $shop_id, $order_sn)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/download_invoice_doc', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/download_invoice_doc?access_token=' . $accesstoken . '&order_sn=' . $order_sn . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . time();
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getBuyerInvoiceInfo($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/order/get_buyer_invoice_info?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
}
