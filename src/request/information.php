<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\Config\config;

class information extends config{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function getShopsByPartner($page_no, $page_size){
        $sign = parent::getSign();
        $suburl = '/public/get_shops_by_partner?page_no='.$page_no.'&page_size='.$page_size.'&partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getMerchantsByPartner($page_no, $page_size){
        $sign = parent::getSign();
        $suburl = '/public/get_merchants_by_partner?page_no='.$page_no.'&page_size='.$page_size.'&partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getAccesTokenGeneral($data = []){
        $suburl = '/auth/token/get';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function freshAccessToken($data = []){
        $suburl = '/auth/access_token/get';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getTokenByResendCode($data = []){
        $sign = parent::getSign();
        $suburl = '/public/get_token_by_resend_code?partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getRefreshTokenByUpgradeCode($data = []){
        $sign = parent::getSign();
        $suburl = '/public/get_refresh_token_by_upgrade_code?partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getShopeeIpRange(){
        $sign = parent::getSign();
        $suburl = '/public/get_shopee_ip_ranges?partner_id='.$this->partnerid.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }



}