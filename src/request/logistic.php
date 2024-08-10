<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\config;

class logistic extends config{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function getShippingParameter($authcode, $shop_id, $order_sn){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/logistics/get_shipping_parameter?access_token='.$access_token.'&order_sn='.$order_sn.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getTrackingNumber($authcode, $shop_id, $order_sn, $miles){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/logistics/get_tracking_number?access_token='. $access_token.'&order_sn='.$order_sn.'&package_number=-&partner_id='.$this->partnerid.'&response_optional_fields='.$miles.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function shiporder($authcode, $shop_id, $data = []){
      $access_token = parent::getAccesToken($authcode, $shop_id); 
      $sign = parent::getSign();
      $suburl = '/logistics/shiporder?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
      $response = $this->shopee->postMethod($suburl, $data);
      return $response;

    }

    public function updateShipOrder($authcode, $shop_id,  $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/logistics/update_shipping_order?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getShippingDocumentParameter($data = []){
        $suburl = '/logistics/get_shipping_document_parameter';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    } 

    public function createShippingDocument($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/logistics/create_shipping_document?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getShippingDocumentResult($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/logistics/get_shipping_document_result?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function downloadShippingDocument($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/logistics/download_shipping_document?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getTrackingInfo($authcode, $shop_id, $order_sn, $package_number){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/logistics/get_tracking_info?access_token='.$access_token.'&order_sn='.$order_sn.'&package_number='.$package_number.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getAddressList($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/logistics/get_address_list?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }


    public function setAddressConfig($data = []){ 
        $suburl = '/logistics/set_address_config ';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }

    public function deleteAddress($data = []){
      $suburl = '/logistics/delete_address';
      $response = $this->shopee->postMethod($suburl, $data);
      return $response;
    }

    public function getChannelList($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/logistics/get_channel_list?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function updateChannel($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/logistics/update_channel?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function batchShipOrder($data = []){
      $suburl = '/logistics/batch_ship_order';
      $response = $this->shopee->postMethod($suburl, $data);
      return $response;
    }

    public function getShippingDocument($authcode, $shop_id, $data = []){
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/logistics/get_shipping_document_data_info?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function updateTrackingStatus($data = []){
        $suburl = '/logistics/update_tracking_status';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    


}