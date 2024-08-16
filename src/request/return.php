<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class payment extends config
{


    private  $partnerid, $shopee;

    public function __construct($partnerid)
    {
        $this->partnerid = $partnerid; 
        $this->shopee = new shopee();
    }

    public function getReturnDetail($url, $data = [])
    {
        $argument = $url . '/returns/get_return_detail';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }


    public function getReturnList($url, $data = [])
    {
        $argument = $url . '/returns/get_return_list';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function returnConfirm($url, $data = [])
    {
        $argument = $url . '/returns/confirm';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function dispute($url, $data)
    {
        $argument = $url . '/returns/dispute';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getAvailableSolutions($url, $authcode, $shop_id, $return_sn)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/get_available_solutions';
        $argument = $url . $suburl . '?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&return_sn=' . $return_sn . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function offer($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/offer';
        $argument = $url . $suburl . '?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function acceptOffer($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/accept_offer';
        $argument = $url . $suburl . '?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function convertImage($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/convert_image';
        $argument = $url . $suburl . '?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function uploadProof($url, $authcode, $shop_id, $data = [])
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/upload_proof';
        $argument = $url . $suburl . '?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function queryProof($url, $authcode, $shop_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/query_proof';
        $argument = $url . $suburl . '?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }

    public function getReturnDispute($url, $authcode, $shop_id)
    {
        $access_token = parent::getAccesToken($authcode, $shop_id);
        $sign = parent::getSign();
        $suburl = '/returns/get_return_dispute_reason';
        $argument = $url . $suburl . '?access_token=' . $access_token . '&partner_id=' . $this->partnerid . '&return_sn=200203171852695&shop_id=' . $shop_id . '&sign=' . $sign . '&timestamp=' . $this->timest;
        $response = $this->shopee->getMethod($argument);
        return $response;
    }
}
