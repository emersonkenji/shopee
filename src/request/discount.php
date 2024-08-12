<?php 

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\config;

class discount extends config{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;
    
    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function addDiscount($data = []){
        $suburl = '/discount/add_discount';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function addDiscountItem($data = []){
        $suburl = '/discount/add_discount_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function deleteDiscount($data = []){
        $suburl = '/discount/delete_discount';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function deleteDiscountItem($data = []){
        $suburl = '/discount/delete_discount_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getDiscount($data = []){
        $suburl = '/discount/get_discount';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getDiscountList($data = []){
        $suburl = '/discount/get_discount_list';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function updateDiscount($data = []){
        $suburl = '/discount/update_discount';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function updateDiscountItem($data = []){
        $suburl = '/discount/update_discount_item';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }


    public function endDiscount($data = []){
        $suburl = '/discount/end_discount';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }



}