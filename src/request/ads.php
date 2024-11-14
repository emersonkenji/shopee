<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class ads extends config
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

    public function getTotalBalace($accesstoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/ads/get_total_balance', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/ads/get_total_balance?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getShopToggleInfo($accesstoken, $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/ads/get_total_balance', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/ads/get_shop_toggle_info?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getRecommendedKeywordList($accesstoken, $shop_id, $keyword, $item_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/ads/get_keyword_rcmd_keyword', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/ads/get_keyword_rcmd_keyword?access_token=' . $accesstoken . '&input_keyword=' . $keyword . '&item_id=' . $item_id . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getRecommendedItemList($accesstoken,  $shop_id)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/ads/get_rcmd_item_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/ads/get_rcmd_item_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getAllCpcAdsHourlyPerformance($accesstoken,  $shop_id, $date)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/ads/get_all_cpc_ads_hourly_performance', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/ads/get_all_cpc_ads_hourly_performance?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&performance_date=' . $date . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getAllCpcAdsDailyPerformance($accesstoken,  $shop_id, $start_date, $end_date)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/ads/get_all_cpc_ads_daily_performance', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/ads/get_all_cpc_ads_daily_performance?access_token=' . $accesstoken . '&end_date=' . $end_date . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&start_date=' . $start_date . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
}
