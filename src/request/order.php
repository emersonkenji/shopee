<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\Config\config;

class order extends config{


    private $config, $partnerid, $partnerkey, $shopee, $access_token; 
    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function getOrderList($authcode, $shop_id, $cursor = '', $order_status = 'READY_TO_SHIP', $page_size = 20, $time_from = 0, $time_to = 0) {
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/order/get_order_list?access_token='.$access_token.'&cursor=%22'.$cursor.'%22&order_status='.$order_status.'&page_size='.$page_size.'&partner_id='.$this->partnerid.'&response_optional_fields=order_status&shop_id='.$shop_id.'&sign='.$sign.'&time_from='.$time_from.'&time_range_field=create_time&time_to='.$time_to.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getShipmentList($authcode, $shop_id, $cursor = '', $page_size = 20, $order_status = '', $time_from = 0, $time_to = 0) {
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/order/get_shipment_list?access_token='.$access_token.'&cursor=%22'.$cursor.'%22&order_status='.$order_status.'&page_size='.$page_size.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&time_from='.$time_from.'&time_to='.$time_to.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getOrderDetail($authcode, $shop_id, $order_sn_list, $request_order_status_pending = true, $response_optional_fields = 'total_amount') {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/order/get_order_detail?access_token='.$access_token.'&order_sn_list='.$order_sn_list.'&partner_id='.$this->partnerid.'&request_order_status_pending='.$request_order_status_pending.'&response_optional_fields='.$response_optional_fields.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function splitOrder($authcode, $shop_id, $order_sn, $items) {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/order/split_order?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest.'&order_sn='.$order_sn.'&items='.$items;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function unSplitOrder($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/order/unsplit_order?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

     public function cancleOrder($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/order/cancel_order?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
     }

     public function handleBuyerCancellation($authcode, $shop_id, $data = []) {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/order/handle_buyer_cancellation?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function setNote($authcode, $shop_id, $data = []) {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/order/set_note?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getPendingBuyerInvoiceOrderList($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/order/get_pending_buyer_invoice_order_list?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response; 
    }

    public function uploadInvoiceDoc($authcode, $shop_id, $data = []) {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/order/upload_invoice_doc?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function downloadInvoiceDoc($authcode, $shop_id, $order_sn) {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/order/download_invoice_doc?access_token='.$access_token.'&order_sn='.$order_sn.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getBuyerInvoiceInfo($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/order/get_buyer_invoice_info?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }


}