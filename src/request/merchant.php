<?php

namespace Faiznurullah\Shopee\Request;

use Faiznurullah\Shopee\Config\config;
use Faiznurullah\Shopee\shopee;

class merchant extends config
{


    private $config, $partnerid, $shopee;

    public function __construct($partnerid)
    {
        $this->partnerid = $partnerid;
        $this->shopee = new shopee();
    }

    public function getMerchantInfo($url, $authcode, $shop_id, $merchant_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/merchant/get_merchant_info?access_token=' . $access_token . '&merchant_id=' . $merchant_id . '&partner_id=' . $this->partnerid . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getShopListByMerchant($url, $authcode, $shop_id, $merchant_id, $page, $page_size)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/merchant/get_shop_list_by_merchant?access_token=' . $access_token . '&merchant_id=' . $merchant_id . '&page_no=' . $page . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getMerchantWarehouse($url, $data = [])
    {
        $argument = $url . '/merchant/get_merchant_warehouse_location_list';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getMerchantWarehouseList($url, $authcode, $shop_id, $merchant_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/merchant/get_merchant_warehouse_list?access_token=' . $access_token . '&merchant_id=' . $merchant_id . '&partner_id=' . $this->partnerid . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getWarehouseEligibleShopList($url, $authcode, $shop_id, $merchant_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/merchant/list_shop_by_warehouse?access_token=' . $access_token . '&merchant_id=' . $merchant_id . '&partner_id=' . $this->partnerid . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
}
