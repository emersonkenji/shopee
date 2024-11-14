<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class returnItem extends config{


    private  $shopee, $url;
    public function __construct()
    { 
        $this->shopee = new shopee();
        
        $this->url = 'https://partner.test-stable.shopeemobile.com';
        if(env('SHOPEE_PRODUCTION_STATUS')){
            $this->url = 'https://partner.shopeemobile.com';
        }
        
    }

    public function getReturnDetail($accesstoken, $shop_id, $return_sn)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/returns/get_return_detail', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/returns/get_return_detail?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') .  '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp.'&return_sn='.$return_sn;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }


    public function getReturnList($accesstoken, $shop_id, $page_no = 0, $page_size = 100, $create_time_from, $create_time_to, $status = 'ACCEPTED')
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/returns/get_return_list', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/returns/get_return_list?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') .  '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp.'&page_size='.$page_size.'&page_no='.$page_no.'&create_time_from='.$create_time_from.'&create_time_to='.$create_time_to."&status=".$status; 
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function returnConfirm($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/returns/confirm', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/returns/confirm?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') .  '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function dispute($accesstoken, $shop_id, $data = [])
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/returns/dispute', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/returns/dispute?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') .  '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getAvailableSolutions($accesstoken, $shop_id, $return_sn)
    {
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/returns/get_available_solutions', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/returns/get_available_solutions?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&return_sn=' . $return_sn . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function offer($accesstoken, $shop_id, $data = [])
    {
        
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/returns/offer', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url .'/api/v2/returns/offer?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function acceptOffer($accesstoken, $shop_id, $data = [])
    { 
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/returns/accept_offer', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url .  '/api/v2/returns/accept_offer?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function convertImage($accesstoken, $shop_id, $data = [])
    {
        
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/returns/convert_image', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url .   '/api/v2/returns/convert_image?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function uploadProof($accesstoken, $shop_id, $data = [])
    {
        
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/returns/upload_proof', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/returns/upload_proof?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' .  $timestamp;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function queryProof($accesstoken, $shop_id, $return_sn)
    {
       
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/returns/query_proof', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/returns/query_proof?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp.'&return_sn='.$return_sn;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getReturnDispute($accesstoken, $shop_id, $return_sn)
    {
        
        $timestamp = time();
        $sign = $this->getGenerateSign('/api/v2/returns/get_return_dispute_reason', $timestamp, $accesstoken, $shop_id);
        $argument = $this->url . '/api/v2/returns/get_return_dispute_reason?access_token=' . $accesstoken . '&partner_id=' . env('SHOPEE_PATNER_ID') . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $timestamp.'&return_sn='.$return_sn;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
}
