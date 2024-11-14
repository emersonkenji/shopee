<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class information extends config
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

    public function getShopsByPartner($accesstoken, $shop_id, $page_no, $page_size)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/public/get_shops_by_partner', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/public/get_shops_by_partner?page_no=' . $page_no . '&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getMerchantsByPartner($accesstoken, $shop_id, $page_no, $page_size)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/public/get_merchants_by_partner', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/public/get_merchants_by_partner?page_no=' . $page_no . '&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }  

   
}
