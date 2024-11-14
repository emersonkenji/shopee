<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class shopcategory extends config
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

    public function addShopeCategory($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/shop_category/add_shop_category', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/shop_category/add_shop_category?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getShopCategoryList($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/shop_category/get_shop_category_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/shop_category/get_shop_category_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteShopCategory($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/shop_category/delete_shop_category', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/shop_category/delete_shop_category?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateShopCategory($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/shop_category/update_shop_category', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/shop_category/update_shop_category?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function addItemList($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/shop_category/add_item_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/shop_category/add_item_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getItemList($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/shop_category/get_item_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/shop_category/get_item_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function deleteItemList($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/shop_category/delete_item_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/shop_category/delete_item_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
}
