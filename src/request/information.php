<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class information extends config
{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function getShopsByPartner($url, $page_no, $page_size)
    {
        $sign = parent::getSign();
        $argument = $url . '/public/get_shops_by_partner?page_no=' . $page_no . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getMerchantsByPartner($url, $page_no, $page_size)
    {
        $sign = parent::getSign();
        $argument = $url . '/public/get_merchants_by_partner?page_no=' . $page_no . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getAccesTokenGeneral($url, $data = [])
    {
        $argument = $url . '/auth/token/get';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function freshAccessToken($url, $data = [])
    {
        $argument = $url . '/auth/access_token/get';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getTokenByResendCode($url, $data = [])
    {
        $sign = parent::getSign();
        $argument = $url . '/public/get_token_by_resend_code?partner_id=' . $this->partnerid . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getRefreshTokenByUpgradeCode($url, $data = [])
    {
        $sign = parent::getSign();
        $argument = $url . '/public/get_refresh_token_by_upgrade_code?partner_id=' . $this->partnerid . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getShopeeIpRange($url)
    {
        $sign = parent::getSign();
        $argument = $url . '/public/get_shopee_ip_ranges?partner_id=' . $this->partnerid . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
}
