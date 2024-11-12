<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;

class order extends config
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
    
    public function getOrderList($accesstoken, $shop_id, $time_from = 0, $time_to = 0, $order_status = 'READY_TO_SHIP', $page_size = 20)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/get_order_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/get_order_list?access_token=' . $accesstoken . '&order_status=' . $order_status . '&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&time_from=' . $time_from . '&time_range_field=create_time&time_to=' . $time_to . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getShipmentList($accesstoken, $shop_id, $cursor = '', $page_size = 20, $order_status = '', $time_from = 0, $time_to = 0)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/get_shipment_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/get_shipment_list?access_token=' . $accesstoken . '&cursor=%22' . $cursor . '%22&order_status=' . $order_status . '&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&time_from=' . $time_from . '&time_to=' . $time_to . '&timestamp=' . $timestamp;
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
    
    public function splitOrder($accesstoken, $shop_id, $order_sn, $items)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/split_order', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/split_order?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp . '&order_sn=' . $order_sn . '&items=' . $items;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function unSplitOrder($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/unsplit_order', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/unsplit_order?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function cancelOrder($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/cancel_order', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/cancel_order?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function handleBuyerCancellation($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/handle_buyer_cancellation', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/handle_buyer_cancellation?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function setNote($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/set_note', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/set_note?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function getPendingBuyerInvoiceOrderList($accesstoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/set_note', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/get_pending_buyer_invoice_order_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function uploadInvoiceDoc($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/upload_invoice_doc', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/upload_invoice_doc?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function downloadInvoiceDoc($accesstoken, $shop_id, $order_sn)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/download_invoice_doc', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/download_invoice_doc?access_token=' . $accesstoken . '&order_sn=' . $order_sn . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . time();
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
    
    public function getBuyerInvoiceInfo($accesstoken, $shop_id, $order_sn_list)
    {
        $paramsn = implode(',', $order_sn_list);
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/order/get_buyer_invoice_info', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/order/get_buyer_invoice_info?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
}
