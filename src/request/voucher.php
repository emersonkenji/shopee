<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\Config\config;
use Faiznurullah\Shopee\shopee;

class voucher extends config
{ 

    private  $shopee, $url;
    public function __construct()
    { 
        $this->timest = time();  
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(filter_var(env('SHOPEE_PRODUCTION_STATUS', true), FILTER_VALIDATE_BOOLEAN)){
            $this->url = 'https://partner.shopeemobile.com';
        }
        
        $this->shopee = new shopee(); 
    }

    public function addVoucher($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/voucher/get_voucher_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/voucher/add_voucher?access_token='.$accesstoken.'&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteVoucher($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/voucher/delete_voucher', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/voucher/delete_voucher?access_token='.$accesstoken.'&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function endVoucher($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/voucher/end_voucher', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/voucher/end_voucher?access_token='.$accesstoken.'&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateVoucher($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/voucher/end_voucher', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/voucher/update_voucher?access_token='.$accesstoken.'&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getVoucher($accesstoken, $shop_id, $voucher_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/voucher/get_voucher', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/voucher/get_voucher?access_token='.$accesstoken.'&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp.'&voucher_id='.$voucher_id;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getVoucherList($accesstoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/voucher/get_voucher_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/voucher/get_voucher_list?access_token='.$accesstoken.'&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp."&status=all&page_no=1&page_size=100"; 
        $response = $this->shopee->getMethod($argument);
        return $response;
    }


}
