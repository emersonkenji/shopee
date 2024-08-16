<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\Config\config;

class deal extends config{

    private $config, $partnerid, $partnerkey, $shopee, $access_token; 
    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function addOnDeal($data = []){
        $suburl = '/add_on_deal/add_add_on_deal';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function addOnDealMainItem($data = []){
        $suburl = '/add_on_deal/add_add_on_deal_main_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function addOnDealSubItem($data = []){
        $suburl = '/add_on_deal/add_add_on_deal_sub_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function deleteAddOnDeal($data = []){
        $suburl = '/add_on_deal/delete_add_on_deal';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function deleteOnDealMainItem($data = []){
        $suburl = '/add_on_deal/delete_add_on_deal_main_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function deleteOnDealSubItem($data = []){
        $suburl = '/add_on_deal/delete_add_on_deal_sub_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getOnDealList($data = []){
        $suburl = '/add_on_deal/delete_add_on_deal_sub_item';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function getOnDeal($data = []){
        $suburl = '/add_on_deal/get_add_on_deal';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function getOnDealMainItem($data = []){
        $suburl = '/add_on_deal/get_add_on_deal_main_item';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function getOnDealSubItem($data = []){
        $suburl = '/add_on_deal/get_add_on_deal_sub_item';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }


    public function updateOnDeal($data = []){
        $suburl = '/add_on_deal/update_add_on_deal';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function updateOnDealMainItem($data = []){
        $suburl = '/add_on_deal/update_add_on_deal_main_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function updateOnDealSubItem($data = []){
        $suburl = '/add_on_deal/update_add_on_deal_sub_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function endOnDeal($data = []){
        $suburl = '/add_on_deal/end_add_on_deal';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }



}