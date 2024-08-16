<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\Config\config;

class fisrtmile extends config{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }
 

    public function getUnbindOrderList($authcode, $shop_id, $page_size){
        $access_token = parent::getAccesToken($authcode, $shop_id); 
        $sign = parent::getSign();
        $suburl = '/first_mile/get_unbind_order_list?access_token='.$access_token.'&cursor=%22%22&page_size='.$page_size.'&partner_id='.$this->partnerid.'&response_optional_fields=logistics_status%2Cpackage_number&shop_id='.$shop_id.'&sign='.$sign.'&timestamp='.$this->timest;
        $response = $this->shopee->getMethod($suburl);
        return $response;
    }


}