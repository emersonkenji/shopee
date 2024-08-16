<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\Config\config;

class ads extends config{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function getTotalBalace($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/ads/get_total_balance?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getShopToggleInfo($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/ads/get_shop_toggle_info?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getRecommendedKeywordList($authcode, $shop_id, $keyword, $item_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/ads/get_keyword_rcmd_keyword?access_token='.$access_token.'&input_keyword='.$keyword.'&item_id='.$item_id.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getRecommendedItemList($authcode, $shop_id){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/ads/get_rcmd_item_list?access_token='.$access_token.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getAllCpcAdsHourlyPerformance($authcode, $shop_id, $date){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/ads/get_all_cpc_ads_hourly_performance?access_token='.$access_token.'&partner_id='.$this->partnerid.'&performance_date='.$date.'&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }

    public function getAllCpcAdsDailyPerformance($authcode, $shop_id, $start_date, $end_date){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/ads/get_all_cpc_ads_daily_performance?access_token='.$access_token.'&end_date='.$end_date.'&partner_id='.$this->partnerid.'&shop_id='.$shop_id.'&sign='.$sign.'&start_date='.$start_date.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }



}