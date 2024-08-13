<?php 

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\config;

class discount extends config{

    private $shopee;
    
    public function __construct()
    { 
        $this->shopee = new shopee();
    }

    public function addDiscount($url, $data = []){
        $argument = $url.'/discount/add_discount';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }

    public function addDiscountItem($url, $data = []){
        $argument = $url.'/discount/add_discount_item';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function deleteDiscount($url, $data = []){
        $argument = $url.'/discount/delete_discount';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function deleteDiscountItem($url, $data = []){
        $argument = $url.'/discount/delete_discount_item';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function getDiscount($url, $data = []){
        $argument = $url.'/discount/get_discount';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function getDiscountList($url, $data = []){
        $argument = $url.'/discount/get_discount_list';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function updateDiscount($url, $data = []){
        $argument = $url.'/discount/update_discount';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function updateDiscountItem($url, $data = []){
        $argument = $url.'/discount/update_discount_item';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }
    
    public function endDiscount($url, $data = []){
        $argument = $url.'/discount/end_discount';
        $response = $this->shopee->postMethod($argument, $data);
        return $response;
    }



}