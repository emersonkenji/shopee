<?php

namespace Faiznurullah\Shopee\Request;

use Faiznurullah\Shopee\Config\config;
use Faiznurullah\Shopee\shopee;

class order extends config
{


    private  $partnerid, $shopee;
    public function __construct($partnerid)
    {
        $this->partnerid = $partnerid; 
        $this->shopee = new shopee();
    }

    public function getOrderList($url, $authcode, $shop_id, $cursor = '', $order_status = 'READY_TO_SHIP', $page_size = 20, $time_from = 0, $time_to = 0)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/order/get_order_list?access_token=' . $access_token . '&cursor=%22' . $cursor . '%22&order_status=' . $order_status . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&response_optional_fields=order_status&shop_id=' . $shop_id . '&sign=' . $sign . '&time_from=' . $time_from . '&time_range_field=create_time&time_to=' . $time_to . '&timestamp=' . $this->timest;
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

    public function getOrderDetail($url, $authcode, $shop_id, $order_sn_list, $request_order_status_pending = true, $response_optional_fields = 'total_amount')
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/order/get_order_detail?access_token=' . $access_token . '&order_sn_list=' . $order_sn_list . '&partner_id=' . $this->partnerid . '&request_order_status_pending=' . $request_order_status_pending . '&response_optional_fields=' . $response_optional_fields . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
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

    public function downloadInvoiceDoc($url, $authcode, $shop_id, $order_sn)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/order/download_invoice_doc?access_token=' . $access_token . '&order_sn=' . $order_sn . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
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
