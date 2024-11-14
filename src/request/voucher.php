<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\Config\config;
use Faiznurullah\Shopee\shopee;

class voucher extends config
{ 

    private  $shopee, $url;
    public function __construct()
    { 
        $this->shopee = new shopee();
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_PRODUCTION_STATUS')){
            $this->url = 'https://partner.shopeemobile.com';
        }
        
    }

    public function addVoucher($url, $data = [])
    {
        $argument = $url . '/voucher/add_voucher';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteVoucher($url, $data = [])
    {
        $argument = $url . '/voucher/delete_voucher';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function endVoucher($url, $data = [])
    {
        $argument = $url . '/voucher/end_voucher';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateVoucher($url, $data = [])
    {
        $argument = $url . '/voucher/update_voucher';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getVoucher($url, $data = [])
    {
        $argument = $url . '/voucher/get_voucher';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getVoucherList($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/voucher/get_voucher_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/voucher/get_voucher_list?access_token='.$accesstoken.'&partner_id='.env('SHOPEE_PATNER_ID').'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$timestamp."&status=all&page_no=1&page_size=100"; 
        $response = $this->shopee->getMethod($argument);
        return $response;
    }


}
