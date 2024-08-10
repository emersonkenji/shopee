<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\config;

class payment extends config{


    private $config, $partnerid, $partnerkey, $shopee, $access_token;
    
    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    


}