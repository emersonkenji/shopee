<?php 

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class discount extends config{

    private  $shopee, $url;
    public function __construct()
    { 
        $this->shopee = new shopee();
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_PRODUCTION_STATUS')){
            $this->url = 'https://partner.shopeemobile.com';
        }
        
    }

    public function addDiscount($accesstoken, $shop_id, $data = []){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/discount/add_discount', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/discount/add_discount?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function addDiscountItem($accesstoken, $shop_id, $data = []){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/discount/add_discount_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/discount/add_discount_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function deleteDiscount($accesstoken, $shop_id, $data = []){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/discount/delete_discount', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/discount/delete_discount?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function deleteDiscountItem($accesstoken, $shop_id, $data = []){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/discount/delete_discount_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/discount/delete_discount_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function getDiscount($accesstoken, $shop_id, $data = []){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/discount/delete_discount_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/discount/get_discount?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function getDiscountList($accesstoken, $shop_id, $data = []){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/discount/delete_discount_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/discount/get_discount_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function updateDiscount($accesstoken, $shop_id, $data = []){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/discount/update_discount', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/discount/update_discount?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function updateDiscountItem($accesstoken, $shop_id, $data = []){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/discount/update_discount_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/discount/update_discount_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function endDiscount($accesstoken, $shop_id, $data = []){
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/discount/end_discount', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url.'/api/v2/discount/end_discount?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }



}