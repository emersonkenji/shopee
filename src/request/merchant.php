<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\Config\config;

class merchant extends config{
    
    
    private $config, $partnerid, $shopee;
    
    public function __construct($partnerid)
    {
        $this->partnerid = $partnerid; 
        $this->shopee = new shopee();
    }
    
    public function getMerchantInfo($authcode, $shop_id, $merchant_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/merchant/get_merchant_info?access_token='.$access_token.'&merchant_id='.$merchant_id.'&partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function getShopListByMerchant($authcode, $shop_id, $merchant_id, $page, $page_size){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/merchant/get_shop_list_by_merchant?access_token='.$access_token.'&merchant_id='.$merchant_id.'&page_no='.$page.'&page_size='.$page_size.'&partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function getMerchantWarehouse($data = []){
        $suburl = '/merchant/get_merchant_warehouse_location_list ';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response; 
    }
    
    public function getMerchantWarehouse_list($authcode, $shop_id, $merchant_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/merchant/get_merchant_warehouse_list?access_token='.$access_token.'&merchant_id='.$merchant_id.'&partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }
    
    public function getWarehouseEligibleShopList($authcode, $shop_id, $merchant_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/merchant/list_shop_by_warehouse?access_token='.$access_token.'&merchant_id='.$merchant_id.'&partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    
    
    
}