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
        if(env('SHOPEE_STATUS_STAGING') == 'Production'){
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

    public function getShopToggleInfo($url, $authcode, $shop_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/ads/get_shop_toggle_info?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getRecommendedKeywordList($url, $authcode, $shop_id, $keyword, $item_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/ads/get_keyword_rcmd_keyword?access_token=' . $access_token . '&input_keyword=' . $keyword . '&item_id=' . $item_id . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getRecommendedItemList($url, $authcode, $shop_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/ads/get_rcmd_item_list?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getAllCpcAdsHourlyPerformance($url, $authcode, $shop_id, $date)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/ads/get_all_cpc_ads_hourly_performance?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&performance_date=' . $date . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getAllCpcAdsDailyPerformance($url, $authcode, $shop_id, $start_date, $end_date)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $argument = $url . '/ads/get_all_cpc_ads_daily_performance?access_token=' . $access_token . '&end_date=' . $end_date . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&start_date=' . $start_date . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
}
