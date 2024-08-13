<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\config;

class deal extends config
{

    private  $shopee;
    public function __construct()
    { 
        $this->shopee = new shopee();
    }

    public function addOnDeal($url, $data = [])
    {
        $argument = $url . '/add_on_deal/add_add_on_deal';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function addOnDealMainItem($url, $data = [])
    {
        $argument = $url . '/add_on_deal/add_add_on_deal_main_item';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function addOnDealSubItem($url, $data = [])
    {
        $argument = $url . '/add_on_deal/add_add_on_deal_sub_item';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteAddOnDeal($url, $data = [])
    {
        $argument = $url . '/add_on_deal/delete_add_on_deal';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteOnDealMainItem($url, $data = [])
    {
        $argument = $url . '/add_on_deal/delete_add_on_deal_main_item';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteOnDealSubItem($url, $data = [])
    {
        $argument = $url . '/add_on_deal/delete_add_on_deal_sub_item';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getOnDealList($url, $data = [])
    {
        $argument = $url . '/add_on_deal/get_add_on_deal_list'; // Corrected endpoint
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getOnDeal($url, $data = [])
    {
        $argument = $url . '/add_on_deal/get_add_on_deal';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getOnDealMainItem($url, $data = [])
    {
        $argument = $url . '/add_on_deal/get_add_on_deal_main_item';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getOnDealSubItem($url, $data = [])
    {
        $argument = $url . '/add_on_deal/get_add_on_deal_sub_item';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function updateOnDeal($url, $data = [])
    {
        $argument = $url . '/add_on_deal/update_add_on_deal';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateOnDealMainItem($url, $data = [])
    {
        $argument = $url . '/add_on_deal/update_add_on_deal_main_item';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateOnDealSubItem($url, $data = [])
    {
        $argument = $url . '/add_on_deal/update_add_on_deal_sub_item';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function endOnDeal($url, $data = [])
    {
        $argument = $url . '/add_on_deal/end_add_on_deal';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
}
