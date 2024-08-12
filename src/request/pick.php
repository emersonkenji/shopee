<?php 

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\config;

class picks extends config{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function getTopPicksList($data = []){
        $suburl = '/top_picks/get_top_picks_list';
        $response = $this->shopee->getMethodWithPayload($suburl, $data);
        return $response;
    }

    public function addTopPicks($data = []){
        $suburl = '/top_picks/add_top_picks';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }

    public function updateTopPicks($data = []){
        $suburl = '/top_picks/update_top_picks';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }
 
    public function deleteTopPicks($data = []){
        $suburl = '/top_picks/delete_top_picks';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }

    

}