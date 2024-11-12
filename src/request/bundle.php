<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class bundle extends config
{

    private  $shopee, $url;
    public function __construct()
    { 
        $this->shopee = new shopee();
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_DEVELOPMENT_STATUS')){
            $this->url = 'https://partner.shopeemobile.com';
        }
        
    }

    public function addBundleDeal($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/bundle_deal/add_bundle_deal', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/bundle_deal/add_bundle_deal?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function addBundleDealItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/bundle_deal/add_bundle_deal_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/bundle_deal/add_bundle_deal_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getBundleDealList($accesstoken, $shop_id, $page_no, $page_size, $time_status)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/bundle_deal/get_bundle_deal_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/bundle_deal/get_bundle_deal_list?access_token=' . $accesstoken . '&page_no=' . $page_no . '&page_size=' . $page_size . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&time_status=' . $time_status . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getBundleDeal($accesstoken, $shop_id, $bundle_deal_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/bundle_deal/get_bundle_deal', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/bundle_deal/get_bundle_deal?access_token=' . $accesstoken . '&bundle_deal_id=' . $bundle_deal_id . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getBundleDealItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/bundle_deal/get_bundle_deal_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/bundle_deal/get_bundle_deal_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function updateBundleDeal($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/bundle_deal/update_bundle_deal', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/bundle_deal/update_bundle_deal?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateBundleDealItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/bundle_deal/update_bundle_deal_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/bundle_deal/update_bundle_deal_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function endBundleDeal($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/bundle_deal/end_bundle_deal', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/bundle_deal/end_bundle_deal?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteBundleDeal($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/bundle_deal/delete_bundle_deal', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/bundle_deal/delete_bundle_deal?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteBundleDealItem($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/bundle_deal/delete_bundle_deal_item', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/bundle_deal/delete_bundle_deal_item?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
}
