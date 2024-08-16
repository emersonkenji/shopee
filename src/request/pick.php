<?php

namespace Faiznurullah\Shopee\request;

use Faiznurullah\Shopee\config\config;
use Faiznurullah\Shopee\shopee;


class pick extends config
{ 
    
    private $shopee;

    public function __construct()
    { 
        $this->shopee = new shopee();
    }

    public function getTopPicksList($url, $data = [])
    {
        $argument = $url . '/top_picks/get_top_picks_list';
        $response = $this->shopee->getMethodWithPayload($argument, $data);
        return $response;
    }

    public function addTopPicks($url, $data = [])
    {
        $argument = $url . '/top_picks/add_top_picks';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function updateTopPicks($url, $data = [])
    {
        $argument = $url . '/top_picks/update_top_picks';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function deleteTopPicks($url, $data = [])
    {
        $argument = $url . '/top_picks/delete_top_picks';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
}
