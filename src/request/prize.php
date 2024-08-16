<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class prize extends config
{


    private  $shopee;

    public function __construct()
    { 
        $this->shopee = new shopee();
    }

    public function addFollowPrize($url, $data = [])
    {
        $argument = $url . '/follow_prize/add_follow_prize';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteFollowPrize($url, $data = [])
    {
        $argument = $url . '/follow_prize/delete_follow_prize';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function endFollowPrize($url, $data = [])
    {
        $argument = $url . '/follow_prize/end_follow_prize';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateFollowPrize($url, $data = [])
    {
        $argument = $url . '/follow_prize/update_follow_prize';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function getFollowPrizeDetail($url, $data = [])
    {
        $argument = $url . '/follow_prize/get_follow_prize_detail';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function getFollowPrizeList($url, $data = [])
    {
        $argument = $url . '/follow_prize/get_follow_prize_list';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }
}
