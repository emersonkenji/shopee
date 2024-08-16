<?php

namespace Faiznurullah\Shopee;

use Faiznurullah\Shopee\Config\config;

class shopcategory extends config{

    private $config, $partnerid, $partnerkey, $shopee, $access_token;

    public function __construct($partnerid, $partnerkey)
    {
        $this->partnerid = $partnerid;
        $this->partnerkey = $partnerkey;
        $this->shopee = new shopee();
    }

    public function addShopeCategory($data = []){
        $suburl = '/shop_category/add_shop_category';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response; 
    }

    public function getShopCategoryList($data = []){
        $suburl = '/shop_category/get_shop_category_list';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function deleteShopCategory($data = []){
        $suburl = '/shop_category/delete_shop_category';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function updateShopCategory($data = []){
        $suburl = '/shop_category/update_shop_category';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function addItemList($data = []){
        $suburl = '/shop_category/add_item_list';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function getItemList($data = []){
        $suburl = '/shop_category/get_item_list';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }

    public function deleteItemList($data = []){
        $suburl = '/shop_category/delete_item_list';
        $response = $this->shopee->postMethod($suburl, $data);
        return $response;
    }


}