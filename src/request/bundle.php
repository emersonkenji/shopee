<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\Config\config;

class bundle extends config
{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function addBundleDeal($authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/bundle_deal/add_bundle_deal?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function addBundleDealItem($data = [])
    {
        $suburl = '/bundle_deal/add_bundle_deal_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getBundleDealList($authcode, $shop_id, $page_no, $page_size, $time_status)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/bundle_deal/get_bundle_deal_list?access_token=' . $access_token . '&page_no=' . $page_no . '&page_size=' . $page_size . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&time_status=' . $time_status . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getBundleDeal($authcode, $shop_id, $bundle_deal_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/bundle_deal/get_bundle_deal?access_token=' . $access_token . '&bundle_deal_id=' . $bundle_deal_id . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getBundleDealItem($data = [])
    {
        $suburl = '/bundle_deal/get_bundle_deal_item';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function updateBundleDeal($data = [])
    {
        $suburl = '/bundle_deal/update_bundle_deal';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function updateBundleDealItem($data = [])
    {
        $suburl = '/bundle_deal/update_bundle_deal_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function endBundleDeal($data = [])
    {
        $suburl = '/bundle_deal/end_bundle_deal';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function deleteBundleDeal($data = []){
        $suburl = '/bundle_deal/delete_bundle_deal';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function deleteBundleDealItem($data = []){
        $suburl = '/bundle_deal/delete_bundle_deal_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }


}
