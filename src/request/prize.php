<?php

namespace Faiznurullah\Shopee;


use Faiznurullah\Shopee\config;

class prize extends config{


    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function addFollowPrize($data = []){
        $suburl = '/follow_prize/add_follow_prize';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }

    public function deleteFollowPrize($data = []){
        $suburl = '/follow_prize/delete_follow_prize';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }

    public function endFollowPrize($data = []){
        $suburl = '/follow_prize/end_follow_prize';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }

    public function updateFollowPrize($data = []){
        $suburl = '/follow_prize/update_follow_prize';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }


    public function getFollowPrizeDetail($data = []){
        $suburl = '/follow_prize/get_follow_prize_detail';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response; 
    }

    public function getFollowPrizeList($data = []){
        $suburl = '/follow_prize/get_follow_prize_list';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response; 
    }

}